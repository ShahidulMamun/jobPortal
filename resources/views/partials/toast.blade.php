<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- partials/toast.blade.php -->
<script>
  @if(session('success'))
    Swal.fire({
      toast: true,
      position: 'top-end',
      icon: 'success',
      // background: '#303841',
      // color: '#fff',
      title: '{{ session('success') }}',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true
    });
  @endif

  @if(session('error'))
    Swal.fire({
      toast: true,
      position: 'top-end',
      icon: 'error',
      title: '{{ session('error') }}',
      showConfirmButton: false,
      timer: 4000,
      timerProgressBar: true
    });
  @endif

  @if ($errors->any())
    Swal.fire({
      toast: true,
      position: 'top-end',
      icon: 'error',
      title: '{{ $errors->first() }}', // প্রথম error দেখাবে
      showConfirmButton: false,
      timer: 4000,
      timerProgressBar: true,
    });
  @endif
</script>
