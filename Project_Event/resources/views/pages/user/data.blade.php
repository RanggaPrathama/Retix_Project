@foreach ($events as $event)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="{{ asset('gambarEvent/' . $event->gambar_event) }}" class="card-img-top"
                                alt="Project 1" />
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $event->nama_event }}</h5>
                                <p class="card-text">{{ $event->nama_lokasi }}</p>
                                <a href="{{ route('event') }}" class="btn btn-primary">Pesan Tiket</a>
                            </div>
                            <ul class="list-group list-group-flush d-flex justify-content-between">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Start From</span>

                                    <p class="text-right">{{ $event->min_harga = 'Rp '. number_format($event->min_harga,0,',','.') }}</p>
                                </li>
                            </ul>
                            <div class="date-container">
                                <span class="date-day">{{ $event->Tanggal_Event }}</span>
                            </div>

                        </div>

                    </div>
                @endforeach
