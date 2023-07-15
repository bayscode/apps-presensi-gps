    @php
        //Function Untuk Menghitung Selisih Jam
        function selisih($jam_masuk, $jam_keluar)
        {
            [$h, $m, $s] = explode(':', $jam_masuk);
            $dtAwal = mktime($h, $m, $s, '1', '1', '1');
            [$h, $m, $s] = explode(':', $jam_keluar);
            $dtAkhir = mktime($h, $m, $s, '1', '1', '1');
            $dtSelisih = $dtAkhir - $dtAwal;
            $totalmenit = $dtSelisih / 60;
            $jam = explode('.', $totalmenit / 60);
            $sisamenit = $totalmenit / 60 - $jam[0];
            $sisamenit2 = $sisamenit * 60;
            $jml_jam = $jam[0];
            return $jml_jam . ' ' . 'Jam' . ' ' . round($sisamenit2) . ' ' . 'Menit';
        }
    @endphp
    @foreach ($presensi as $d)
        @php
            $foto_in = Storage::url('uploads/absensi/' . $d->foto_in);
            $foto_out = Storage::url('uploads/absensi/' . $d->foto_out);
        @endphp
        <tr class="align-middle">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $d->nik }}</td>
            <td>{{ $d->nama_lengkap }}</td>
            <td>{{ $d->nama_dept }}</td>
            <td>{{ $d->jam_in }}</td>
            <td class="text-center">
                <img src="{{ url($foto_in) }}" class="avatar avatar-sm" alt="">
            </td>
            <td>{!! $d->jam_out != null ? $d->jam_out : '<span class="badge bg-danger">Belum Absen</span>' !!}</td>
            <td class="text-center">
                @if ($d->jam_out != null)
                    <img src="{{ url($foto_out) }}" class="avatar avatar-sm" alt="">
                @else
                    <span class="badge bg-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-loader"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 6l0 -3"></path>
                            <path d="M16.25 7.75l2.15 -2.15"></path>
                            <path d="M18 12l3 0"></path>
                            <path d="M16.25 16.25l2.15 2.15"></path>
                            <path d="M12 18l0 3"></path>
                            <path d="M7.75 16.25l-2.15 2.15"></path>
                            <path d="M6 12l-3 0"></path>
                            <path d="M7.75 7.75l-2.15 -2.15"></path>
                        </svg>
                    </span>
                @endif
            </td>
            <td>
                @if ($d->jam_in >= '07:00')
                    @php
                        $jamterlambat = selisih('07:00:00', $d->jam_in);
                    @endphp
                    <span class="badge bg-danger">Terlambat {{ $jamterlambat }}</span>
                @else
                    <span class="badge bg-success">Tepat Waktu</span>
                @endif
            </td>
            <td>
                <a href="#" class="btn btn-primary tampilkanpeta" id="{{ $d->id }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-google-maps"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 9.5m-2.5 0a2.5 2.5 0 1 0 5 0a2.5 2.5 0 1 0 -5 0"></path>
                        <path d="M6.428 12.494l7.314 -9.252"></path>
                        <path d="M10.002 7.935l-2.937 -2.545"></path>
                        <path d="M17.693 6.593l-8.336 9.979"></path>
                        <path
                            d="M17.591 6.376c.472 .907 .715 1.914 .709 2.935a7.263 7.263 0 0 1 -.72 3.18a19.085 19.085 0 0 1 -2.089 3c-.784 .933 -1.49 1.93 -2.11 2.98c-.314 .62 -.568 1.27 -.757 1.938c-.121 .36 -.277 .591 -.622 .591c-.315 0 -.463 -.136 -.626 -.593a10.595 10.595 0 0 0 -.779 -1.978a18.18 18.18 0 0 0 -1.423 -2.091c-.877 -1.184 -2.179 -2.535 -2.853 -4.071a7.077 7.077 0 0 1 -.621 -2.967a6.226 6.226 0 0 1 1.476 -4.055a6.25 6.25 0 0 1 4.811 -2.245a6.462 6.462 0 0 1 1.918 .284a6.255 6.255 0 0 1 3.686 3.092z">
                        </path>
                    </svg>
                </a>
            </td>
        </tr>
    @endforeach
    <script>
        $(function() {
            $(".tampilkanpeta").click(function(e) {
                var id = $(this).attr("id");
                $.ajax({
                    type: 'POST',
                    url: '/tampilkanpeta',
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id
                    },
                    cache: false,
                    success: function(respond) {
                        $("#loadmap").html(respond);
                    }
                });
                $("#modal-tampilkanpeta").modal("show");
            });
        });
    </script>
