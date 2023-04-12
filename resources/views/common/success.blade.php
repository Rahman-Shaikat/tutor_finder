@if(session()->has('success'))
<div class="row">
    <div class="col-md-12 text-center">
        <p class="p-3 w-50 text-text-center rounded btn btn-success mt-2"> <i class="fa-regular fa-circle-check"></i> {{session()->get('success')}} </p>
    </div>
</div>
@endif