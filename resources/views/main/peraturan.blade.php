@extends('main.layouts.main')

@section('content')
  <section id="peraturan" class="w-full mt-[76px] p-2">
    <div class="w-full flex flex-col gap-12">
      <div class="w-full flex flex-col gap-2.5 p-1 lg:flex-row lg:items-center">
        <div class="w-full flex flex-col items-center lg:w-1/3">
          <span class="text-3xl font-bold">Peraturan</span>
          <lottie-player src="{{ asset('img/animation_llyfs55m.json') }}" background="#ffffff" speed="1" style="width: 180px; height: 180px" loop autoplay direction="1" mode="normal"></lottie-player>
        </div>
        <div class="w-full grid grid-cols-1 gap-2 lg:grid-cols-2  ">
          <div class="flex p-2.5 bg-blue-primary items-center gap-2.5 rounded-lg">
            <div class="bg-blue-secondary text-blue-primary flex items-center justify-center text-2xl font-bold rounded-lg p-5">
              <span class="w-[30px] text-center">01</span>
            </div>
            <div class="text-white text-start text-sm">Hanya anggota yang terdaftar yang dapat mengakses perpustakaan melalui online.
            </div>
          </div>
          <div class="flex p-2.5 bg-blue-primary items-center gap-2.5 rounded-lg">
            <div class="bg-blue-secondary text-blue-primary flex items-center justify-center text-2xl font-bold rounded-lg p-5">
              <span class="w-[30px] text-center">02</span>
            </div>
            <div class="text-white text-start text-sm">Anggota diharapkan untuk menggunakan materi perpustakaan secara etis dan legal.
            </div>
          </div>
          <div class="flex p-2.5 bg-blue-primary items-center gap-2.5 rounded-lg">
            <div class="bg-blue-secondary text-blue-primary flex items-center justify-center text-2xl font-bold rounded-lg p-5">
              <span class="w-[30px] text-center">03</span>
            </div>
            <div class="text-white text-start text-sm">Tidak diperbolehkan menyalin, mendistribusikan, atau mengkomersialkan materi tanpa izin.
            </div>
          </div>
          <div class="flex p-2.5 bg-blue-primary items-center gap-2.5 rounded-lg">
            <div class="bg-blue-secondary text-blue-primary flex items-center justify-center text-2xl font-bold rounded-lg p-5">
              <span class="w-[30px] text-center">04</span>
            </div>
            <div class="text-white text-start text-sm">Keterlambatan pengembalian dapat mengakibatkan denda atau sanksi lainnya.
            </div>
          </div>
          <div class="flex p-2.5 bg-blue-primary items-center gap-2.5 rounded-lg">
            <div class="bg-blue-secondary text-blue-primary flex items-center justify-center text-2xl font-bold rounded-lg p-5">
              <span class="w-[30px] text-center">05</span>
            </div>
            <div class="text-white text-start text-sm">Buku perpustakaan yang dipinjam, tidak boleh dicuri atau dirusak.
            </div>
          </div>
          <div class="flex p-2.5 bg-blue-primary items-center gap-2.5 rounded-lg">
            <div class="bg-blue-secondary text-blue-primary flex items-center justify-center text-2xl font-bold rounded-lg p-5">
              <span class="w-[30px] text-center">06</span>
            </div>
            <div class="text-white text-start text-sm">Laporkan jika Anda menemukan materi yang rusak sebelum meminjamnya.
            </div>
          </div>
          <div class="flex p-2.5 bg-blue-primary items-center gap-2.5 rounded-lg">
            <div class="bg-blue-secondary text-blue-primary flex items-center justify-center text-2xl font-bold rounded-lg p-5">
              <span class="w-[30px] text-center">07</span>
            </div>
            <div class="text-white text-start text-sm">Pelanggaran peraturan dapat mengakibatkan pemblokiran akses atau tindakan sesuai kebijakan.
            </div>
          </div>
          <div class="flex p-2.5 bg-blue-primary items-center gap-2.5 rounded-lg">
            <div class="bg-blue-secondary text-blue-primary flex items-center justify-center text-2xl font-bold rounded-lg p-5">
              <span class="w-[30px] text-center">08</span>
            </div>
            <div class="text-white text-start text-sm">Penggunaan PERPUS65 dianggap sebagai persetujuan terhadap peraturan yang telah ditetapkan.
            </div>
          </div>
        </div>
      </div>
      <div class="w-2/3 self-center h-[1px] bg-gray-500"></div>
      <div class="w-full flex flex-col lg:flex-row gap-2.5 p-1 lg:w-6/6 lg:self-start items-center justify-between">
        <div class="flex flex-col items-center lg:w-1/3">
          <span class="text-2xl font-bold text-center">Frequently Asked Question</span>
          <lottie-player src="{{ asset('img/animation_llyfuuta.json') }}" background="#ffffff" speed="1" style="width: 180px; height: 180px" loop autoplay direction="1" mode="normal" class="self-center"></lottie-player>
        </div>
        <div class="w-full grid grid-cols-1 gap-y-4">
          <div id="accordionFlushExampleOne">
            <div
              class="rounded-none border border-l-0 border-r-0 border-t-0 border-neutral-200 bg-white dark:border-neutral-600 dark:bg-neutral-800">
              <h2 class="mb-0" id="flush-headingOne">
                <button
                  class="group relative flex w-full items-center rounded-none border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)]"
                  type="button"
                  data-te-collapse-init
                  data-te-collapse-collapsed
                  data-te-target="#flush-collapseOne"
                  aria-expanded="false"
                  aria-controls="flush-collapseOne">
                  Bagaimana cara saya menjadi anggota terdaftar di perpustakaan online PERPUS 65 ?
                  <span
                    class="-mr-1 ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      class="h-6 w-6">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                  </span>
                </button>
              </h2>
              <div
                id="flush-collapseOne"
                class="!visible hidden border-0"
                data-te-collapse-item
                aria-labelledby="flush-headingOne"
                data-te-parent="#accordionFlushExample">
                <div class="px-5 py-4 text-sm">
                  Untuk mendaftar sebagai anggota, Anda dapat mengakses halaman pendaftaran / register di website perpustakaan
                </div>
              </div>
            </div>
          </div>
          <div id="accordionFlushExampleTwo">
            <div
              class="rounded-none border border-l-0 border-r-0 border-t-0 border-neutral-200 bg-white dark:border-neutral-600 dark:bg-neutral-800">
              <h2 class="mb-0" id="flush-headingTwo">
                <button
                  class="group relative flex w-full items-center rounded-none border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)]"
                  type="button"
                  data-te-collapse-init
                  data-te-collapse-collapsed
                  data-te-target="#flush-collapseTwo"
                  aria-expanded="false"
                  aria-controls="flush-collapseTwo">
                  Apa yang harus saya lakukan jika buku perpustakaan yang saya pinjam rusak atau hilang ?
                  <span
                    class="-mr-1 ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      class="h-6 w-6">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                  </span>
                </button>
              </h2>
              <div
                id="flush-collapseTwo"
                class="!visible hidden border-0"
                data-te-collapse-item
                aria-labelledby="flush-headingTwo"
                data-te-parent="#accordionFlushExampleOne">
                <div class="px-5 py-4 text-sm">
                  Buku perpustakaan yang dipinjam harus dijaga dengan baik. Jika Anda menemukan bahan yang rusak sebelum meminjamnya, laporkan kepada staf perpustakaan. Jika rusak atau hilang setelah dipinjam, maka akan dikenakan sanksi ataupun denda untuk menggantinya.
                </div>
              </div>
            </div>
          </div>
          <div id="accordionFlushExampleThree">
            <div
              class="rounded-none border border-l-0 border-r-0 border-t-0 border-neutral-200 bg-white dark:border-neutral-600 dark:bg-neutral-800">
              <h2 class="mb-0" id="flush-headingThree">
                <button
                  class="group relative flex w-full items-center rounded-none border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)]"
                  type="button"
                  data-te-collapse-init
                  data-te-collapse-collapsed
                  data-te-target="#flush-collapseThree"
                  aria-expanded="false"
                  aria-controls="flush-collapseThree">
                  Bagaimana cara meminjam buku dalam perpustakaan online ?
                  <span
                    class="-mr-1 ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      class="h-6 w-6">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                  </span>
                </button>
              </h2>
              <div
                id="flush-collapseThree"
                class="!visible hidden border-0"
                data-te-collapse-item
                aria-labelledby="flush-headingThree"
                data-te-parent="#accordionFlushExampleTwo">
                <div class="px-5 py-4 text-sm">
                  Setelah masuk ke akun Anda, cari buku yang ingin Anda pinjam pada halaman "Koleksi" lalu pilih buku yang akan dipinjam,  Anda akan diarahkan untuk mengisi formulir peminjaman. Setelah itu Anda akan diberi sebuah kode unik atau QR yang akan digunakan untuk mengonfirmasi peminjaman
                </div>
              </div>
            </div>
          </div>
          <div id="accordionFlushExampleFour">
            <div
              class="rounded-none border border-l-0 border-r-0 border-t-0 border-neutral-200 bg-white dark:border-neutral-600 dark:bg-neutral-800">
              <h2 class="mb-0" id="flush-headingFour">
                <button
                  class="group relative flex w-full items-center rounded-none border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)]"
                  type="button"
                  data-te-collapse-init
                  data-te-collapse-collapsed
                  data-te-target="#flush-collapseFour"
                  aria-expanded="false"
                  aria-controls="flush-collapseFour">
                  Bagaimana cara mencari buku atau materi tertentu di perpustakaan online ?
                  <span
                    class="-mr-1 ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      class="h-6 w-6">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                  </span>
                </button>
              </h2>
              <div
                id="flush-collapseFour"
                class="!visible hidden border-0"
                data-te-collapse-item
                aria-labelledby="flush-headingFour"
                data-te-parent="#accordionFlushExampleThree">
                <div class="px-5 py-4 text-sm">
                  Anda dapat menggunakan fitur pencarian di website kami untuk mencari buku atau materi berdasarkan judul, penulis, atau kategori tertentu.
                </div>
              </div>
            </div>
          </div>
          <div id="accordionFlushExampleFive">
            <div
              class="rounded-none border border-l-0 border-r-0 border-t-0 border-neutral-200 bg-white dark:border-neutral-600 dark:bg-neutral-800">
              <h2 class="mb-0" id="flush-headingFive">
                <button
                  class="group relative flex w-full items-center rounded-none border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)]"
                  type="button"
                  data-te-collapse-init
                  data-te-collapse-collapsed
                  data-te-target="#flush-collapseFive"
                  aria-expanded="false"
                  aria-controls="flush-collapseFive">
                  Apakah perpustakaan online ini menyediakan akses ke sumber-sumber pendidikan atau akademik tertentu ?
                  <span
                    class="-mr-1 ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      class="h-6 w-6">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                  </span>
                </button>
              </h2>
              <div
                id="flush-collapseFive"
                class="!visible hidden border-0"
                data-te-collapse-item
                aria-labelledby="flush-headingFive"
                data-te-parent="#accordionFlushExampleFour">
                <div class="px-5 py-4 text-sm">
                  Banyak perpustakaan online menyediakan akses ke sumber-sumber pendidikan dan akademik seperti jurnal ilmiah, tesis, dan buku teks. Anda dapat mencari koleksi khusus ini melalui fitur pencarian kami.
                </div>
              </div>
            </div>
          </div>
          <div id="accordionFlushExampleSix">
            <div
              class="rounded-none border border-l-0 border-r-0 border-t-0 border-neutral-200 bg-white dark:border-neutral-600 dark:bg-neutral-800">
              <h2 class="mb-0" id="flush-headingSix">
                <button
                  class="group relative flex w-full items-center rounded-none border-0 bg-white px-5 py-4 text-left text-base text-neutral-800 transition [overflow-anchor:none] hover:z-[2] focus:z-[3] focus:outline-none dark:bg-neutral-800 dark:text-white [&:not([data-te-collapse-collapsed])]:bg-white [&:not([data-te-collapse-collapsed])]:text-primary [&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(229,231,235)] dark:[&:not([data-te-collapse-collapsed])]:bg-neutral-800 dark:[&:not([data-te-collapse-collapsed])]:text-primary-400 dark:[&:not([data-te-collapse-collapsed])]:[box-shadow:inset_0_-1px_0_rgba(75,85,99)]"
                  type="button"
                  data-te-collapse-init
                  data-te-collapse-collapsed
                  data-te-target="#flush-collapseSix"
                  aria-expanded="false"
                  aria-controls="flush-collapseSix">
                  Apa jenis materi yang tersedia di perpustakaan online ?
                  <span
                    class="-mr-1 ml-auto h-5 w-5 shrink-0 rotate-[-180deg] fill-[#336dec] transition-transform duration-200 ease-in-out group-[[data-te-collapse-collapsed]]:mr-0 group-[[data-te-collapse-collapsed]]:rotate-0 group-[[data-te-collapse-collapsed]]:fill-[#212529] motion-reduce:transition-none dark:fill-blue-300 dark:group-[[data-te-collapse-collapsed]]:fill-white">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke-width="1.5"
                      stroke="currentColor"
                      class="h-6 w-6">
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                  </span>
                </button>
              </h2>
              <div
                id="flush-collapseSix"
                class="!visible hidden border-0"
                data-te-collapse-item
                aria-labelledby="flush-headingSix"
                data-te-parent="#accordionFlushExampleFive">
                <div class="px-5 py-4 text-sm">
                  Koleksi perpustakaan online kami mencakup beragam jenis mulai dari kategori fiksi maupun non fiksi, termasuk buku, artikel, jurnal, majalah, e-book, dan sumber daya multimedia lainnya.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<script src="{{ asset('js/lottie-player.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
@endsection