@section('selectize-js')
<script  src="{{asset('js/vendors/selectize.min.js')}}"></script>
<script>
   $('.selectize').selectize({
	plugins: ['remove_button'],
					create: true,
					sortField: {
						field: 'text',
						direction: 'asc'
					},
					dropdownParent: 'body'
				});
</script>

@endsection