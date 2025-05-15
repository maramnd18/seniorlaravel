<!DOCTYPE html>
<html>
<head>
    <title>MU Faculties and Majors</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .faculty {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        }

        .faculty h2 {
            margin-top: 0;
            color: #2c3e50;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        th {
            background-color: #2c3e50;
            color: white;
        }
    </style>
</head>
<body>
    <h1>Al Maaref University</h1>

    @php
        $json = file_get_contents(public_path('json/mu_majors.json'));
        $data = json_decode($json, true);
    @endphp

    @foreach($data['faculties'] as $faculty)
        <div class="faculty">
            <h2>{{ $faculty['name'] }}</h2>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Major</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($faculty['majors'] as $index => $major)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $major }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
</body>
</html>
