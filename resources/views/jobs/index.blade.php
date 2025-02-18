@extends('layouts.app')

@section('content')
    <h1>Post a New Job</h1>

    <!-- Job Form -->
    <form id="jobForm">
        @csrf
        <input type="text" name="title" id="title" placeholder="JOB TITLE" required>
        <input type="text" name="company" id="company" placeholder="Company" required>
        <input type="text" name="location" id="location" placeholder="Location" required>
        <textarea name="description" id="description" placeholder="Job Description" required></textarea>
        <input type="number" name="salary" id="salary" placeholder="Salary" required>
        <button type="submit">Add Job</button>
    </form>

    <div class="job-list">
        <h2>Job Listings</h2>
        <table id="jobTable">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Company</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                <!-- Jobs will be dynamically populated -->
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            // Initialize DataTable
            var table = $('#jobTable').DataTable({
                //processing: true,
                //serverSide: true,
                ajax: {
                    url: '/jobs/data',
                    type: 'GET',
                    dataSrc: function (json) {
                        return json.data.map(function (job) {
                            return {
                                title: job.title,
                                company: job.company,
                                location: job.location,
                                description: job.description,
                                salary: '$' + parseFloat(job.salary).toFixed(2)
                            };
                        });
                    }
                },
                columns: [
                    { data: 'title' },
                    { data: 'company' },
                    { data: 'location' },
                    { data: 'description' },
                    { data: 'salary' }
                ]
            });

            // Handle form submission
            $('#jobForm').submit(function (e) {
                e.preventDefault();

                var formData = {
                    title: $('#title').val(),
                    company: $('#company').val(),
                    location: $('#location').val(),
                    description: $('#description').val(),
                    salary: $('#salary').val(),
                    _token: $('input[name="_token"]').val()
                };

                $.ajax({
                    url: '/jobs',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        // Refresh the table after job is added
                        table.ajax.reload();

                        // Clear the form
                        $('#jobForm')[0].reset();
                        alert('Job added successfully!');
                    },
                    error: function(xhr, status, error) {
                        alert('Error: ' + xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
