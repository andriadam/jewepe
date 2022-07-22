<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Buat PDF</title>
  <style type='text/css'>
    .text-center {
      margin-left: auto;
      margin-right: auto;
    }

    /* Table */
    .table {
      border-collapse: collapse;
      font-size: 12px;
    }

    .table th,
    .table td {
      padding: 5px 10px;
    }

    /* Table Header */
    .table th {
      text-transform: uppercase;
    }

    /* .table tr:nth-child(odd) td {
      background-color: #f4fff7;
    } */

    .total {
      text-align: center
    }

    .kosong {
      text-align: center
    }

    body {
      font-size: 12px;
      font-family: Arial;
    }

    table {
      border: solid thin #000;
      width: 100%;
      margin-bottom: 1cm;
    }

    td {
      padding: 6px 12px;
      border: solid thin #000;
      text-align: left;
      color: #353535;
    }

    /* th {
      padding: 6px 12px;
      border: solid thin #000;
      text-align: center;
      color: #353535;
    } */

    .bg-success {
      background-color: #F5F5F5;
      font-weight: bold;
      border: solid thin #000;
    }
  </style>
</head>

<body>
  <h1 style="text-align: center; font-size: 18px; font-weight: bold;">
    Bukti Pendaftaraan</h1>
  <p >Dicetak Tanggal: {{ date('d-m-Y') }}</p>
  <hr>
  <table class="table">
    {{-- <thead>
      <tr class="bg-success" style="font-weight: bold;">
        <th>No.</th>
        <th>No.Booking</th>
      </tr>
    </thead> --}}
    <tbody>
      @if ($data)
      <tr>
        <td class="text-end">Id</td>
        <td>{{ $data->id }}</td>
      </tr>
      <tr>
        <td>Nama</td>
        <td>{{ $data->user->nama }}</td>
      </tr>
      <tr>
        <td>Kelas</td>
        <td>{{ $data->user->kelas }}</td>
      </tr>
      <tr>
        <td>NPM</td>
        <td>{{ $data->user->npm }}</td>
      </tr>
      <tr>
        <td>Kursus</td>
        <td>{{ $data->schedule->nama_kursus }}</td>
      </tr>
      <tr>
        <td>Jadwal</td>
        <td>{{ $data->schedule->waktu_kursus }}</td>
      </tr>
      <tr>
        <td>Status</td>
        <td>{{ $data->status }}</td>
      </tr>
      @else
      <tr>
        <td colspan="8">Tidak ada data.</td>
      </tr>
      @endif
    </tbody>
  </table>
</body>

</html>