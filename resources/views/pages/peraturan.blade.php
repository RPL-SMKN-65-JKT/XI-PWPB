@extends('layouts.main')

@section('title', 'Peraturan')

@section('content')

    <div class="p-8 bg-gray-100 flex flex-wrap justify-center items-start gap-6" style="margin-top: 60px;">
        <div class="lg:w-2/3 w-full  mx-auto bg-white p-6 rounded-md shadow-md">
            <!-- Hero Image Section -->
            <div class="mb-3">
              <img src="{{ asset('assets/31561.jpg') }}" alt="Hero Image" class="w-full object-cover rounded-md mb-4">
              <h1 class="sm:text-2xl text-xl font-bold">Peraturan Perpustakaan</h1>
            </div>

            <section>
              <h2 class="text-lg font-semibold mb-2">1. Peminjaman Buku</h2>
              <p class="text-gray-700">
                Pengunjung yang ingin meminjam buku harus terdaftar sebagai anggota
            </p>
            </section>

            <section class="mt-4">
              <h2 class="text-lg font-semibold mb-2">2. Kerusakan Buku</h2>
              <p class="text-gray-700">
                Pengunjung wajib segera melaporkan jika buku yang dipinjam rusak atau
                ‘hilang</p>
            </section>

            <section class="mt-4">
              <h2 class="text-lg font-semibold mb-2">3. Tindak Pencurian/Penyalahgunaan</h2>
              <p class="text-gray-700">
                Pencurian atau penyalah gunaan buku atau barang perpustakaan lainnya.
                akan ditindak tegas sesuai dengan hukum yang berlaku.              </p>
            </section>
            <!-- Contoh penambahan gambar disebelah peraturan -->
            <section class="mt-4 flex items-center">
              {{-- <img src="path-to-your-image.jpg" alt="Peraturan Lainnya" class="w-16 h-16 object-cover rounded-full mr-4"> --}}
              <div>
                <h2 class="text-lg font-semibold mb-2">4. Keterlambatan Pengembalian</h2>
                <p class="text-gray-700">
                    Keterlambatan pengembalian buku akan dikenakan denda sesuai dengan
                </p>
              </div>
            </section>

            <section class="mt-4 flex items-center">
                {{-- <img src="path-to-your-image.jpg" alt="Peraturan Lainnya" class="w-16 h-16 object-cover rounded-full mr-4"> --}}
                <div>
                  <h2 class="text-lg font-semibold mb-2">5. Kerusakan / Kehilangan Buku</h2>
                  <p class="text-gray-700">
                    Pengunjung bertanggung jawab atas kerusakan atau kehilangan buku yang
                    dipinjam dan harus menggantinya sesuai dengan nilai buku tersebut.</p>
                </div>
              </section>

              <section class="mt-4 flex items-center">
                {{-- <img src="path-to-your-image.jpg" alt="Peraturan Lainnya" class="w-16 h-16 object-cover rounded-full mr-4"> --}}
                <div>
                  <h2 class="text-lg font-semibold mb-2">6. Pengembalian Buku</h2>
                  <p class="text-gray-700">
                      Peminjam wajib mengembalikan buku sesuai tanggal kembali dari peminjaman, jika lewat dari itu maka akan terkena denda terlambat sebesar 5k/hari
                  </p>
                </div>
              </section>

          </div>

          <main class="px-5 bg-white lg:w-2/3 w-full">
            <div class="flex justify-center items-start my-2">
              <div class="w-full">
                <img src="{{ asset('assets/7879.jpg') }}" alt="Hero Image" class="w-full object-cover rounded-md mb-4">
                <ul class="flex flex-col">
                  <li class="bg-white my-2 shadow-lg" x-data="accordion(1)">
                    <h2
                      @click="handleClick()"
                      class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
                    >
                      <span>When will my order arrive?</span>
                      <svg
                        :class="handleRotate()"
                        class="fill-current text-purple-700 h-6 w-6 transform transition-transform duration-500"
                        viewBox="0 0 20 20"
                      >
                        <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                      </svg>
                    </h2>
                    <div
                      x-ref="tab"
                      :style="handleToggle()"
                      class="border-l-2 border-purple-600 overflow-hidden max-h-0 duration-500 transition-all"
                    >
                      <p class="p-3 text-gray-900">
                        Shipping time is set by our delivery partners, according to the delivery method chosen by you. Additional details can be found in the order confirmation
                      </p>
                    </div>
                  </li>
                  <li class="bg-white my-2 shadow-lg" x-data="accordion(2)">
                    <h2
                      @click="handleClick()"
                      class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
                    >
                      <span>How do I track my order?</span>
                      <svg
                        :class="handleRotate()"
                        class="fill-current text-purple-700 h-6 w-6 transform transition-transform duration-500"
                        viewBox="0 0 20 20"
                      >
                        <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                      </svg>
                    </h2>
                    <div
                      class="border-l-2 border-purple-600 overflow-hidden max-h-0 duration-500 transition-all"
                      x-ref="tab"
                      :style="handleToggle()"
                    >
                      <p class="p-3 text-gray-900">
                        Once shipped, you’ll get a confirmation email that includes a tracking number and additional information regarding tracking your order.
                      </p>
                    </div>
                  </li>
                  <li class="bg-white my-2 shadow-lg" x-data="accordion(3)">
                    <h2
                      @click="handleClick()"
                      class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
                    >
                      <span>What’s your return policy?</span>
                      <svg
                        :class="handleRotate()"
                        class="fill-current text-purple-700 h-6 w-6 transform transition-transform duration-500"
                        viewBox="0 0 20 20"
                      >
                        <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                      </svg>
                    </h2>
                    <div
                      class="border-l-2 border-purple-600 overflow-hidden max-h-0 duration-500 transition-all"
                      x-ref="tab"
                      :style="handleToggle()"
                    >
                      <p class="p-3 text-gray-900">
                        We allow the return of all items within 30 days of your original order’s date. If you’re interested in returning your items, send us an email with your order number and we’ll ship a return label.
                      </p>
                    </div>
                  </li>
                  <li class="bg-white my-2 shadow-lg" x-data="accordion(4)">
                    <h2
                      @click="handleClick()"
                      class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
                    >
                      <span>How do I make changes to an existing order?</span>
                      <svg
                        :class="handleRotate()"
                        class="fill-current text-purple-700 h-6 w-6 transform transition-transform duration-500"
                        viewBox="0 0 20 20"
                      >
                        <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                      </svg>
                    </h2>
                    <div
                      class="border-l-2 border-purple-600 overflow-hidden max-h-0 duration-500 transition-all"
                      x-ref="tab"
                      :style="handleToggle()"
                    >
                      <p class="p-3 text-gray-900">
                        Changes to an existing order can be made as long as the order is still in “processing” status. Please contact our team via email and we’ll make sure to apply the needed changes. If your order has already been shipped, we cannot apply any changes to it. If you are unhappy with your order when it arrives, please contact us for any changes you may require.
                      </p>
                    </div>
                  </li>
                  <li class="bg-white my-2 shadow-lg" x-data="accordion(5)">
                    <h2
                      @click="handleClick()"
                      class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
                    >
                      <span>What shipping options do you have?</span>
                      <svg
                        :class="handleRotate()"
                        class="fill-current text-purple-700 h-6 w-6 transform transition-transform duration-500"
                        viewBox="0 0 20 20"
                      >
                        <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                      </svg>
                    </h2>
                    <div
                      class="border-l-2 border-purple-600 overflow-hidden max-h-0 duration-500 transition-all"
                      x-ref="tab"
                      :style="handleToggle()"
                    >
                      <p class="p-3 text-gray-900">
                        For USA domestic orders we offer FedEx and USPS shipping.
                      </p>
                    </div>
                  </li>
                  <li class="bg-white my-2 shadow-lg" x-data="accordion(6)">
                    <h2
                      @click="handleClick()"
                      class="flex flex-row justify-between items-center font-semibold p-3 cursor-pointer"
                    >
                      <span>What payment methods do you accept?</span>
                      <svg
                        :class="handleRotate()"
                        class="fill-current text-purple-700 h-6 w-6 transform transition-transform duration-500"
                        viewBox="0 0 20 20"
                      >
                        <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                      </svg>
                    </h2>
                    <div
                      class="border-l-2 border-purple-600 overflow-hidden max-h-0 duration-500 transition-all"
                      x-ref="tab"
                      :style="handleToggle()"
                    >
                      <p class="p-3 text-gray-900">
                        Any method of payments acceptable by you. For example: We accept MasterCard, Visa, American Express, PayPal, JCB Discover, Gift Cards, etc.
                      </p>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </main>
        <script>
          document.addEventListener('alpine:init', () => {
            Alpine.store('accordion', {
              tab: 0
            });

            Alpine.data('accordion', (idx) => ({
              init() {
                this.idx = idx;
              },
              idx: -1,
              handleClick() {
                this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this.idx;
              },
              handleRotate() {
                return this.$store.accordion.tab === this.idx ? 'rotate-180' : '';
              },
              handleToggle() {
                return this.$store.accordion.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
              }
            }));
          })
        </script>

    </div>
@endsection
