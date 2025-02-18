<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings</title>

   <!-- Bootstrap CSS (Make sure this is loaded first) -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

<!-- Custom CSS (Make sure this is loaded last to override styles if needed) -->
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">

</head>
<body>

    <!-- Main Content -->
    <div class="container">
        @yield('content')
    </div>

    <!-- jQuery (Needed for DataTables & Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <!-- Bootstrap Bundle JS (Ensure it's loaded last) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts')

</body>
</html>
