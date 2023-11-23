@foreach ($events as $event)
                    <div class="col-md-4 mb-3" data-event-id = {{ $event->id_event }} data-event-status = {{ $event->status }}>
                        <div class="card " >
                            <img src="{{ asset('gambarEvent/' . $event->gambar_event) }}" class="card-img-top {{ $event->status == 0 ? 'nonaktif' : ''  }}"
                                alt="Project 1" />
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $event->nama_event }}</h5>
                                <p class="card-text">{{ $event->nama_lokasi }}</p>
                                <a href="{{ route('event',$event->slug) }}" class="btn btn-primary {{ $event->status == 0  || $event->status == 2 ? 'disabled' : '' }}">Pesan Tiket</a>
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

                            @if ( $event->status == 0 )
                            <div class="status-danger">
                                <span class="text-status text-white">Ended</span>
                            </div>
                            @endif

                            @if($event->status == 2)
                            <div class="status-blue">
                                <span class="text-status text-white">Coming Soon</span>
                            </div>
                            @endif
                        </div>


                    </div>
                @endforeach
