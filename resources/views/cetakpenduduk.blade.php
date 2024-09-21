<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LAPORAN DATA PENDUDUK</title>

    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
</head>

<body>
    <div style="margin:1cm">
        <div style="height:100px;width:100%" class="mb-5">
            <div style="height:90px;width:90px;float:left" class="">
            </div>
            <div class="text-center lh-20px">
                <span style="font-size: 14pt" class="font-weight-bold">PEMERINTAHAN KABUPATEN BUTON TENGAH</span><br>
                <span style="font-size: 14pt" class="font-weight-bold">KECAMATAN MAWASANGKA TIMUR</span><br>
                <span style="font-size: 14pt" class="font-weight-bold">DESA LASORI</span><br>
                <div style="font-size: 11pt; font-style: italic">
                  Lasori, Kecamatan Mawasangka Timur, Kabupaten Buton Tengah, Sulawesi Tenggara
                </div>
            </div>
            <hr style="border-top: 5px double #000000;">
            <div class="text-center lh-20px">
              <span style="font-size: 14pt" class="font-weight-bold"><u>DATA PENDUDUK</u></span><br>      
            </div>
            <br>

        <table border="1" cellspacing="0" cellpadding="5">
          <thead>
            <tr>
              <th style="width:2%;"><center>No</center></th>
              <th style="width:10%;"><center>NIK</center></th>
              <th style="width:10%;"><center>KK</center></th>
              <th style="width:15%;"><center>Nama</center></th>
              <th style="width:4%;"><center>J K</center></th>
              <th style="width:15%;"><center>T T L</center></th>
              <th style="width:5%;"><center>Agama</center></th>
              <th style="width:30%;"><center>Alamat</center></th>
            </tr>
          </thead>
          <tbody>
            @php $i=1 @endphp
            @foreach($penduduk as $p)
            <tr>
              <td style=""><center>{{ $i++ }}</center></td>
              <td style=""><center>{{$p->nik}}</center></td>
              <td style=""><center>{{$p->kk}}</center></td>
              <td style="">{{$p->nama}}</td>
              <td style=""><center>{{$p->jenis_kelamin == 1 ? "L" : "P"}}</center></td>
              <td style="">{{$p->tempat_lahir}}, {{date('d-m-Y',strtotime($p->tanggal_lahir)) }}</td>
              <td style="">{{$p->agama->nama}}</td>
              <td style="">{{$p->alamat}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
          <div class="mt-3">
            <div style="margin-left: 50%; width: 50%" class="text-center float-right">
                <p style="margin-bottom: 100px">
                    Lasori, {{date('d F Y') }}  <br>
                    Kepala Desa Lasori
                </p>
                <p style="" class="bold underline"><u><b>
                    Buradin, S.T.
                </p></u></p>
            </div>
          </div>
        </div>
    </div>
</body>

</html>



