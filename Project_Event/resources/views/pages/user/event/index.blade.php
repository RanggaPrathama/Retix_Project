@extends('layouts.appUser')

@section('content')
    <section class="header-section" id="section_1">
        <div class="container-fluid page-header py-5 mb-5 wow fadeIn custom-header " data-wow-delay="0.1s">
            <div class="container py-5 mt-5">
                <h2 class=" text-white py-5 px-4 mb-4 animated slideInDown">{{ $events->nama_event }}</h2>
                <a href="{{ $events->maps }}" style="margin-left: 25px;  ">
                    <h6 style="color:#e0a502">View In Maps</h6>
                </a>
                <h6 style="float: right;">Status : <span style="color: #e0a502">
                        @if ($events->status == 0)
                            Tidak Aktif
                        @elseif ($events->status == 1)
                            Aktif
                        @else
                            Non Aktif
                        @endif
                    </span> </h6>

            </div>

        </div>
    </section>




    <section class="artists-section section-padding" id="section_3">

        <div class="row" id="satutiket">
            <div class="col-lg-8" style="overflow-y: auto; max-height: 450px"  >
                <div class="card" style="width: 45rem;">

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><img src="{{ asset('gambarEvent/' . $events->gambar_event) }}"
                                class="card-img-top" alt="Project 1" /></li>
                        <li class="list-group-item">

                            <h5 style="padding-left : 20px; padding-bottom:20px;">Description</h5>
                            <pre>
{{ $events->deskripsi_event }}
</pre>

                        </li>
                        <li class="list-group-item">
                            <pre> <br>
📆 : {{ $events->tgl_event }}

⏰ : {{ $events->time_event }} - Selesai

📍 : {{ $events->nama_lokasi }}
                            </pre>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="col-lg-4">

                <form id='form' action="{{ route('pemesanan') }}" method="POST">
                    @csrf
                <div class="card" style="width: 23rem; ">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <h4>Kategori Tiket</h4>
                        </li>

                        <li class="list-group-item" style="background-color: #fbfbfb">

                            @foreach ($kategoris as $kategori)
                                <div class="card mb-3">

                                    <div class="card-body  ">
                                        <h5 class="card-title">{{ $kategori->nama_kategori }}</h5>
                                        {{-- <p> {{ $kategori->id_detilEvent }}</p> --}}
                                        <input type="hidden" name="id_detilEvent[]" value="{{ $kategori->id_detilEvent }}">
                                        <input type="hidden" class="kuota" value="{{ $kategori->kuota_event }}">
                                        <input type="hidden" class="sisakuota" value="{{ $kategori->sisa_kuota }}">
                                        <div class="text-end d-flex justify-content-between">
                                        <p class="card-text ">
                                            {{ 'Rp.' . number_format($kategori->harga_event, 0, ',', '.') }}
                                        </p>
                                        <input type="hidden" class="harga" value="{{ $kategori->harga_event }}">
                                        <input type="hidden" class="subtotal" value="0">
                                        <button class="btn btn-custom2 text-white milih-button " type="button" >Submit</button>

                                        @if ($kategori->sisa_kuota>0)

                                        <div class="wrapper d-flex justify-content-end d-none">

                                            <div class="col-sm-6">
                                                <div class="input-group">
                                                    <button class="btn btn-outline-primary minus"
                                                        type="button">-</button>
                                                    <input type="text" style="background-color: white"
                                                        class="form-control quantity text-center fs-5" name="quantity[]"
                                                        value="0" max="5" readonly>

                                                    <button class="btn btn-outline-primary plus" type="button"
                                                        style="border-radius: 0 7px 7px 0">+</button>

                                                </div>
                                            </div>

                                        </div>

                                        @else
                                        <button class= "btn btn-secondary disabled"  type="button">Sold Out</button>
                                        @endif
                                    </div>




                                    </div>
                                </div>
                            @endforeach




                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="float-left ">
                                <h4>Subtotal</h4>
                                <p class="displayTotal">RP 0,00</p>
                                <input type="hidden" id="totalharga" name="total_tagihan" value="0">
                            </span>
                            <input type="hidden" name="id_user" value="{{ auth()->user()->id_user }}" >
                            <a href="">  <button type="submit" class="btn btn-primary"
                                    style="width: 100px; height: 50px; margin-top: 25px;">Checkout</button></a>
                        </li>



                    </ul>
                </div>
             </form>
            </div>

        </div>


    </section>




    <script>
        const minusButton = document.querySelectorAll('.minus');
        const plusButton = document.querySelectorAll('.plus');
        const quantity = document.querySelectorAll('.quantity');
        const hargas = document.querySelectorAll('.harga');
        const kuota = document.querySelectorAll('.kuota');
        const total = document.querySelectorAll('.total');
        const subtotal = document.querySelectorAll('.subtotal')
        const submitButtons = document.querySelectorAll('.milih-button');
        const wrapper = document.querySelectorAll('.wrapper');
        const form = document.getElementById('form');


        submitButtons.forEach(function(button, index) {
            button.addEventListener('click', function() {

                const wrapper = this.nextElementSibling;
                //const wrapper = document.querySelectorAll('.wrapper')
                this.style.display = 'none';

                wrapper.classList.remove('d-none');

                quantity[index].value = 1;



                updateHarga(index);

                updateTotalHarga();

                // const detilEventInput = document.getElementById('id_detilEvent_' + index);
                // detilEventInput.style.display = 'block';




            });
        });

        //Minus

        minusButton.forEach(function(minusbtn, index) {
            minusbtn.addEventListener('click', function() {
                if (quantity[index].value > 0) {
                    quantity[index].value = parseInt(quantity[index].value) - 1;
                    updateHarga(index);
                }
                if (quantity[index].value == 0) {
                    submitButtons[index].style.display = 'block';
                    wrapper[index].classList.add('d-none');
                    quantity[index].value = 0;
                    // const detilEventInput = document.getElementById('id_detilEvent_' + index);
                    // detilEventInput.style.display = 'none';

                }

                updateTotalHarga()
            });
        });

        // PLUS
        plusButton.forEach(function(plusbtn, index) {
            plusbtn.addEventListener('click', function() {

                const quantity1  = parseInt(quantity[index].value) ;
                const maxquantity = 5;
                if(quantity1 < maxquantity){
                    quantity[index].value = quantity1+1;
                    updateHarga(index);
                     updateTotalHarga()
                }
               else{
                    alert('Maaf Anda Hanya Bisa Memesan 5 Tiket Event');
               }

            });

        })

        // LOGIKA PERKALIAN QUANTITY * HARGA
        function updateHarga(index) {
            const JumlahBeli = quantity[index].value;
            const harga = hargas[index].value;
            const TotalValue = JumlahBeli * harga;

            subtotal[index].value = TotalValue;

        }

        // lOGIKA SUM SUB TOTAL
        function updateTotalHarga() {
            let totalKeranjang = 0;

            const subtotalElements = document.querySelectorAll('.subtotal');
            subtotalElements.forEach(function(subtotalElement) {
                const subtotalValue = parseInt(subtotalElement.value);
                totalKeranjang += subtotalValue;
            });

            // Mengupdate elemen total keseluruhan
            const totalKeranjangElement = document.querySelector('.displayTotal');
            totalKeranjangElement.textContent = totalKeranjang.toLocaleString('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });

            // Mengupdate nilai pada input hidden dengan ID "totalharga"
            const totalHargaInput = document.querySelector('#totalharga');
            totalHargaInput.value = totalKeranjang;
        }


        form.addEventListener('submit', function(event) {
            event.preventDefault();

            let selectedCategories = 0;
            quantity.forEach(function(qty, index) {
                const jumlah = parseInt(qty.value);
                if (jumlah > 0) {
                    selectedCategories++;
                }
            });

            if (selectedCategories >= 1) {
                this.submit();
            } else {
                alert('Anda harus memilih kategori terlebih dahulu');
            }
        });


    </script>

    {{-- <script>
        // Inisialisasi variabel 'a' untuk setiap kategori tiket
        const a = [1, 1, 1]; // Inisialisasi dengan 1 untuk setiap kategori

        // Ambil semua elemen plus, minus, dan num
        const plusButtons = document.querySelectorAll(".plus");
        const minusButtons = document.querySelectorAll(".minus");
        const numElements = document.querySelectorAll(".num");

        // Tambahkan event listener ke setiap elemen plus
        plusButtons.forEach((plusButton, index) => {
            plusButton.addEventListener("click", () => {
                a[index]++;
                a[index] = (a[index] < 10) ? "0" + a[index] : a[index];
                numElements[index].innerText = a[index];
            });
        });

        // Tambahkan event listener ke setiap elemen minus
        minusButtons.forEach((minusButton, index) => {
            minusButton.addEventListener("click", () => {
                if (a[index] > 1) {
                    a[index]--;
                    a[index] = (a[index] < 10) ? "0" + a[index] : a[index];
                    numElements[index].innerText = a[index];
                }
            });
        });



        const submitButtons = document.querySelectorAll('.submit-button');

        // Iterasi melalui setiap tombol "Submit"
        submitButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Temukan elemen wrapper yang terkait dengan tombol ini
              //

                // Sembunyikan tombol "Submit"
                this.style.display = 'none';

                // Tampilkan elemen wrapper
                wrapper.classList.remove('d-none');
            });
        });
    </script>


    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/custom.js"></script> --}}
@endsection
