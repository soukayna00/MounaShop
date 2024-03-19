@extends('parent')
@section('title','email')

@section('content')
<h2 class="display-2"> Envoyer un email :</h2>

<div class="container justify-content-center mt-3">
    @include('incs.flash')
</div>
    <div class="container" style="background-color: rgb(53, 48, 48)">
        <div class="row justify-content-center">
            <form action="{{ route('send.email') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="recipientName" style="color: white">Recipient Name:</label>
                    <input type="text" class="form-control" name="recipientName" required>
                </div>
                <div class="form-group">
                    <label for="recipient_email" style="color: white">Recipient Email:</label>
                    <input type="email" class="form-control" name="recipient_email" required>
                </div>

                <div class="form-group">
                    <label for="subject" style="color: white">Subject:</label>
                    <input type="text" class="form-control" name="subject" required>
                </div>

                <div class="form-group" style="color: white">
                    <label for="message">Message:</label>
                    <textarea class="form-control" name="message" rows="5" required></textarea>
                </div>

                <button type="submit" class="btn btn-dark">Send Email</button>
            </form>
        </div>
    </div>
@endsection



<!-- Inclure jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<!-- Inclure les fichiers JavaScript de Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>

