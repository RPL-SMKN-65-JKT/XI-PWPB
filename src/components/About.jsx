import React from "react";

const About = () => {
  return (
    <div
      name="about"
      className="w-full h-screen bg-gradient-to-b from-gray-800 to-black text-white"
    >
      <div className="max-w-screen-lg p-4 mx-auto flex flex-col justify-center w-full h-full">
        <div className="pb-8">
          <p className="text-4xl text-green-400 font-bold inline border-b-4 border-green-500">
            About
          </p>
        </div>

        <p className="text-xl text-green-500 mt-20">
          web pertama saya penggunakan react.js dan tailwind.css sebagai desain
          dari webnya dan pembuat lewat tutorial react-js dan tailwind.css
        </p>

        <br />

        <p className="text-xl text-green-500">
            jika ingin tau lebih tentang saya isi di contact kamu 
            akan bisa menggenali tentang saya  lebih jauh dan bisa menjadi teman
        </p>
      </div>
    </div>
  );
};

export default About;