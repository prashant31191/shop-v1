<div id="accordion-subcategory">  
    
	@foreach($children as $child)

	{{-- {{ dd($child->category_id) }} --}}
		<div class="card">

			<div class="card-header">
				<a class="collapsed card-link" data-toggle="collapse" href="#subcategory{{ $child->id }}">{{ $child->name }} ({{ count($child->children) }})</a>
			</div>

			<div id="subcategory{{ $child->id }}" class="collapse" data-parent="#accordion-subcategory">
				<div class="card-body">
					@if(count($child->children))
					
					@foreach($child->children as $value)
						<div class="card-header">
							{{ $value->name }}
						</div>
					@endforeach
						
					@endif
				</div>
			</div>

		</div>           
		
	@endforeach
	
</div>