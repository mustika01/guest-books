@extends('master')

@section('title', 'Guest Book')

@section('content')
    <h4 class="mb-4">Guest Book</h4>
    <form id="guestbookForm" action="/guestbook/store" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="room">Room:</label>
                    <select class="form-control" id="room" name="room" required>
                        <option value="" disabled selected>Choose room</option>
                        @foreach ($rooms as $room)
                            <option value="{{ $room->name }}">{{ $room->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="requirement">Requirement:</label>
            <textarea class="form-control" id="requirement" name="requirement" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('guestbookForm').addEventListener('submit', function(event) {
                event.preventDefault();

                var formData = new FormData(this);

                fetch(this.action, {
                        method: this.method,
                        body: formData
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Your entry has been submitted successfully!',
                        });

                        document.getElementById('guestbookForm').reset();
                    })
                    .catch(error => {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        });
                    });
            });
        });
    </script>
@endsection
