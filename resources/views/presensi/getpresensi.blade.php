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
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-current-location"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                        <path d="M12 12m-8 0a8 8 0 1 0 16 0a8 8 0 1 0 -16 0"></path>
                        <path d="M12 2l0 2"></path>
                        <path d="M12 20l0 2"></path>
                        <path d="M20 12l2 0"></path>
                        <path d="M2 12l2 0"></path>
                    </svg>
                    Cek
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
