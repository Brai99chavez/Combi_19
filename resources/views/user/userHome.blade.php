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
  title: '<em>{{$message}}</em>',
  icon: 'success',
  iconColor: '#105671',
  confirmButtonColor: '#105671',
  confirmButtonText: 'ok'
})
</script>
@enderror
@endsection