@section('selectize-js')
<script  src="{{asset('js/vendors/selectize.min.js')}}"></script>
<script>
   $('.selectize').selectize({
	plugins: ['remove_button'],
					sortField: {
						field: 'text',
						direction: 'asc'
					},
					dropdownParent: 'body',
					create:false,
					placeholder:'Please Select'
				});
</script>

@endsection