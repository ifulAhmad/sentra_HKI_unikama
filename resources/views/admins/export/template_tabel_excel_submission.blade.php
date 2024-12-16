<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Data</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #4f46e5;
            color: white;
        }
    </style>
</head>

<body>
    <h1>Data Pengajuan</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>Negara pertamakali diumumkan</th>
                <th>Kota pertamakali diumumkan</th>
                <th>Skema</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>{{ $submission->judul }}</td>
                <td>{{ \Carbon\Carbon::parse($submission->created_at)->format('d M Y') }}</td>
                <td>{!! $submission->deskripsi !!}</td>
                <td>{{ $submission->negara }}</td>
                <td>{{ $submission->kota }}</td>
                <td>{{ $submission->skema }}</td>
            </tr>
        </tbody>
    </table>

    <h2>Data Pencipta</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tanggal Lahir</th>
                <th>Kontak</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($submission->applicants as $applicant)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    @php
                        $applicant->nik = htmlspecialchars($applicant->nik);
                    @endphp
                    <td>{!! $applicant->nik !!}</td>
                    <td>{{ $applicant->nama }}</td>
                    <td>{{ $applicant->email }}</td>
                    <td>{{ \Carbon\Carbon::parse($applicant->tgl_lahir)->format('d M Y') }}</td>
                    <td>{{ $applicant->kontak }}</td>
                    <td>{!! $applicant->alamat !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
