package main

import (
	"database/sql"
	"embed"
	"log"
	"net/http"

	_ "github.com/go-sql-driver/mysql"
	"github.com/gofiber/fiber/v2"
	"github.com/gofiber/fiber/v2/middleware/session"
	"github.com/gofiber/storage/sqlite3"
	"github.com/gofiber/template/html"
)

//go:embed views/*
var viewsfs embed.FS

var db *sql.DB

var store *session.Store

func main() {
	var err error
	db, err = sql.Open("mysql", "root:@tcp(127.0.0.1:3306)/hololive")
	if err != nil {
		log.Fatal("failed to connect to database")
	}
	defer db.Close()
	engine := html.NewFileSystem(http.FS(viewsfs), ".html")

	app := fiber.New(fiber.Config{Views: engine})

	storage := sqlite3.New()
	store = session.New(session.Config{Storage: storage})

	app.Static("/source", "./source")
	app.Static("/css", "./css")

	// routes
	app.Get("/", getIndex)
	app.Get("/about", getAbout)
	app.Get("/members", getMembers)
	app.Get("/event", getEvent)
	app.Get("/account", getAccount)
	app.Get("/ticket", getTicket)
	app.Get("/buy", getBuy)
	app.Get("/anggota", getAnggota)

	// sign up
	app.Get("/signup", getSignup)
	app.Post("/signupprocess", postSignup)

	// login
	app.Get("/login", getLogin)
	app.Post("/loginprocess", postLogin)

	// log out
	app.Get("/logout", getLogout)

	log.Fatal(app.Listen(":3030"))
}

func getIndex(c *fiber.Ctx) error {
	sess, err := store.Get(c)
	if err != nil {
		panic(err)
	}

	login := sess.Get("login")

	if login == "true" {
		return c.Render("views/index", fiber.Map{
			"Login": login,
		})
	}

	return c.Render("views/index", fiber.Map{})
}
func getAbout(c *fiber.Ctx) error {
	sess, err := store.Get(c)
	if err != nil {
		panic(err)
	}

	login := sess.Get("login")

	if login == "true" {
		return c.Render("views/about", fiber.Map{
			"Login": login,
		})
	}

	return c.Render("views/about", fiber.Map{})
}
func getMembers(c *fiber.Ctx) error {
	sess, err := store.Get(c)
	if err != nil {
		panic(err)
	}

	login := sess.Get("login")

	if login == "true" {
		return c.Render("views/members", fiber.Map{
			"Login": login,
		})
	}

	return c.Render("views/members", fiber.Map{})
}
func getEvent(c *fiber.Ctx) error {
	sess, err := store.Get(c)
	if err != nil {
		panic(err)
	}

	login := sess.Get("login")

	if login == "true" {
		return c.Render("views/event", fiber.Map{
			"Login" : login,
		})
	}

	return c.Render("views/event", fiber.Map{})
}
func getSignup(c *fiber.Ctx) error {
	sess, err := store.Get(c)
	if err != nil {
		panic(err)
	}

	login := sess.Get("login")

	if login == "true" {
		return c.Redirect("/")
	}

	return c.Render("views/signup", fiber.Map{})
}
func getLogin(c *fiber.Ctx) error {
	sess, err := store.Get(c)
	if err != nil {
		panic(err)
	}

	login := sess.Get("login")

	if login == "true" {
		return c.Redirect("/")
	}

	return c.Render("views/login", fiber.Map{})
}
func getAccount(c *fiber.Ctx) error {
	sess, err := store.Get(c)
	if err != nil {
		panic(err)
	}

	login := sess.Get("login")

	if !(login == "true") {
		return c.Redirect("/login")
	}
	
	name := sess.Get("name")

	var silver int
	var gold int

	err = db.QueryRow("SELECT silver_card, gold_card FROM user WHERE name = ?", name).Scan(&silver, &gold)

	var HaveTicket string
	if silver > 0 || gold > 0 {
		HaveTicket = "false"
	}else{
		HaveTicket = "true"
	}


	return c.Render("views/account", fiber.Map{
		"Login" : login,
		"SilverAmount" : silver,
		"GoldAmount": gold,
		"HaveTicket": HaveTicket,
	})
}
func getTicket(c *fiber.Ctx) error {
	sess, err := store.Get(c)
	if err != nil {
		panic(err)
	}

	login := sess.Get("login")

	if !(login == "true") {
		return c.Redirect("/login")
	}

	return c.Render("views/ticket", fiber.Map{
		"Login" : login,
	})
}
func getBuy(c *fiber.Ctx) error {
	sess, err := store.Get(c)
	if err != nil {
		panic(err)
	}

	login := sess.Get("login")

	if !(login == "true") {
		return c.Redirect("/login")
	}

	ticket := c.Query("ticket")
	name := sess.Get("name")

	var silver int
	var gold int

	db.QueryRow("SELECT silver_card, gold_card FROM user WHERE name = ?", name).Scan(&silver, &gold)

	switch ticket {
	case "gold":
		gold += 1
		_, err := db.Exec("UPDATE user SET gold_card = ? WHERE name = ?", gold, name)
		if err != nil {
			return c.SendString(err.Error())
		}
	case "silver":
		silver += 1
		_, err := db.Exec("UPDATE user SET silver_card = ? WHERE name = ?", silver, name)
		if err != nil {
			return c.SendString(err.Error())
		}
	default:
		return c.Redirect("/ticket")
	}

	return c.Redirect("/account")
}
func getLogout(c *fiber.Ctx) error {
	sess, err := store.Get(c)
	if err != nil {
		panic(err)
	}

	login := sess.Get("login")

	if !(login == "true") {
		return c.Redirect("/login")
	}

	// Destroy session
	if err := sess.Destroy(); err != nil {
		panic(err)
	}

	return c.Redirect("/")
}
func getAnggota(c *fiber.Ctx) error {
	sess, err := store.Get(c)
	if err != nil {
		panic(err)
	}

	login := sess.Get("login")

	if login == "true" {
		return c.Render("views/anggota", fiber.Map{
			"Login" : login,
		})
	}

	return c.Render("views/anggota", fiber.Map{})
}

func postSignup(c *fiber.Ctx) error {
	name := c.FormValue("name")
	password := c.FormValue("password")
	confirm_password := c.FormValue("confirm_password")

	rows, err := db.Query("SELECT name FROM user WHERE name = ?", name)
	if err != nil {
		log.Fatal("error query")
	}
	defer rows.Close()

	if rows.Next(){
		return c.Render("views/signup", fiber.Map{
			"Confirmation": "username sudah dipakai!",
		})
	}

	if password != confirm_password {
		return c.Render("views/signup", fiber.Map{
			"Confirmation": "password dan confirm password harus sama!",
		})
	}

	_, err = db.Exec("INSERT INTO user (id, name, password, email) VALUES (?,?,?,?)", "", name, password, "")
	if err != nil {
		log.Fatal("failed insert to database")
		return c.SendStatus(http.StatusInternalServerError)
	}
	return c.Redirect("/login")
}

func postLogin(c *fiber.Ctx) error {
	sess, err := store.Get(c)
	if err != nil {
		panic(err)
	}

	name := c.FormValue("name")
	password := c.FormValue("password")

	var rowsPassword string
	rows, err := db.Query("SELECT password FROM user WHERE name = ?", name)
	if err != nil {
		log.Fatal("error query")
	}
	defer rows.Close()

	if rows.Next(){
		err = rows.Scan(&rowsPassword)
		if err != nil {
			log.Fatal("err:", err.Error())
			return c.SendStatus(http.StatusInternalServerError)
		}

		if password == rowsPassword {
			sess.Set("login", "true")
			sess.Set("name", name)

			if err := sess.Save(); err != nil {
				panic(err)
			}
			c.Redirect("/event")
		}else{
			return c.Render("views/login", fiber.Map{
				"Confirmation": "Username atau Password salah",
			})
		}
	}

	return c.Render("views/login", fiber.Map{
		"Confirmation": "Username atau Password salah",
	})
}