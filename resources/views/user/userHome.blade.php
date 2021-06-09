@extends('user.userLayout')

@section('title', 'home')

@section('headerTitle')
<h1>Bienvenido</h1>
@endsection
        
@section('content')
  <div class="formulary">
     <h2>Bienvenido a Combi 19</h2>
  </div>
@error('permiso')
<script>
  Swal.fire({
      icon: 'warning',
      iconColor: '#48C9B0',
      title: '<strong style= "color: white; font-family: arial;">{{$message}}</strong>',
      background:'#404040',
      confirmButtonColor: '#45B39D ',
      confirmButtonText: 'Got it!' ,
  })
</script>
@enderror
@endsection