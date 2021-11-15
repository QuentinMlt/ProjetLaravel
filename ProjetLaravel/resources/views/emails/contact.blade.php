
<body>
    
        <form method="post" action="{{route('register')}}">
            @csrf
    
            <div class="form-group">
                <label>Nom d'utilisateur</label><br>
                <input type="text" name="name" required class="form-control" value="bb">
            </div>
    
            <div class="form-group">
                <label>Email</label><br>
                <input type="email" name="email" required class="form-control" value="bb@lol.com">
            </div>
            
            <div class="form-group">
                <label>Mot de passe</label><br>
                <input type="password" name="password" required class="form-control" value="gouss95974">
            </div>
            
            <div class="form-group">
                <label>Confirmation du Mot de passe</label><br>
                <input type="password" name="password_confirmation" required class="form-control" value="gouss95974">
            </div>
            <br>
            <button type="submit" class="btn btn-success mt-3">Accepter la demande d'inscription</button>
        </form>

        <div>{{$content}}</div>

        <a href="{{route('register')}}">ProjetLaravel</a>

</body>
