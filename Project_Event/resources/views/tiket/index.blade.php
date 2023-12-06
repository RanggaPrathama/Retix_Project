<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body{
            background-color: #ffffff
        }
    </style>
</head>
<body>
    <h1 style="text-align: center">Pemberitahuan ACC Pembayaran Tiket Retix</h1><br>
    <div class="container">
        <strong>Hai {{ $dataArray['name'] }},</strong>
        <br>
        <div style="font-family:courier;">Kami sudah ACC Pembayaran Tiket Event Anda</div>
        <br>
        <div style="font-family:courier;">Event : <strong> {{ $dataArray['nama_event'] }} </strong></div><br>
        <div style="font-family:courier;">Kode : <strong> {{ $dataArray['INVOICE'] }} </strong></div><br>
        <div style="font-family:courier;">Status : <strong> PIRED </strong></div><br>
        <div style="font-family:courier;">Tanggal Event : <strong> {{ $dataArray['tanggal_event'] }}</strong></div><br>
        <div style="font-family:courier;">TIME : <strong> {{ $dataArray['time_event'] }} - SELESAI </strong></div><br>
        <div class="halo">
            <div style="font-family:courier;">Lokasi :<strong>{{ $dataArray['nama_lokasi'] }}</strong></div>
        </div>
        <br>
        <p style="font-family:courier;">Kami sebagai Panitia Tidak bertanggung jawab jika ada yang terjadi dalam tiket event anda</p>
        <p style="font-family:courier;">Terima kasih atas partisipasi anda dalam website ini</p>
        <footer>
            {{-- <span style="font-style: italic">Website Bantu Mereka, 2023</span> --}}
            <span class="text-gray-800 fw-semibold me-1">2023&copy;</span>
            <span class="text-gray-800">Retix Jiwanya event,</span>
            <a href="/" target="_blank" class="text-gray-800 text-hover-primary" style="text-decoration: none; color:black"><b>Website Retix</b></a>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
