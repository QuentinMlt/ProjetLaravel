@extends('layout')

@section('content')
<div class="container">
    <h1>Demande d'inscription</h1>
    <form action="{{route('sendMail')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nom d'utilisateur</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label hidden>Sujet</label>
            <input type="text" name="subject" class="form-control" hidden value="Demande d'inscription">
        </div>
        <div class="form-group">
            <label>Message</label>
            <textarea name="message" required rows="5"  class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3">Envoyer la demande d'inscription</button>
    </form>

    
</div>
@endsection