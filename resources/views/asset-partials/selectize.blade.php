@section('selectize-js')
<script  src="{{asset('js/vendors/selectize.min.js')}}"></script>
<script>
   $('#depts').selectize({
					create: true,
					sortField: {
						field: 'text',
						direction: 'asc'
					},
					dropdownParent: 'body'
				});
</script>

@endsection