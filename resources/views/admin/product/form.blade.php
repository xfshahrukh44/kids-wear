<div class="form-body">
    <div class="row">

        <div class="col-md-12">
            <div class="form-group">
                {!! Form::Label('category', 'Select Category:') !!}
                <select name="category" class="form-control" id="category" required>
                    <option value="0"> Select Category </option>
                    @foreach($items as $key => $val_items)
                        <option value="{{ $val_items->id }}"> {{ $val_items->name }} </option>
                    @endforeach
                </select>
            </div>
        </div>



        <div class="col-md-12" id="subcategory_sec" >
            <div class="form-group">
                {!! Form::Label('item', 'Select Sub-Category:') !!}
                <select name="subcategory" id="subcategory" class="form-control">

                </select>
            </div>
        </div>




        <div class="col-md-12" id="childsubcategory_sec" >
            <div class="form-group">
                {!! Form::Label('item', 'Select Child Sub-Category:') !!}
                <select name="childsubcategory" id="childsubcategory" class="form-control">

                </select>
            </div>
        </div>


        <div class="col-md-12">
            <div class="form-group">
               {!! Form::label('product_title', 'Product Title') !!}
               {!! Form::text('product_title', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('price', 'Price') !!}
                {!! Form::text('price', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('is_featured', 'Featured product') !!}
                <select name="is_featured" id="" class="form-control">
                    <option value="0" {!! isset($product) && $product->is_featured == '0' ? 'selected' : '' !!}>No</option>
                    <option value="1" {!! isset($product) && $product->is_featured == '1' ? 'selected' : '' !!}>Yes</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('is_best_selling', 'Best selling') !!}
                <select name="is_best_selling" id="" class="form-control">
                    <option value="0" {!! isset($product) && $product->is_best_selling == '0' ? 'selected' : '' !!}>No</option>
                    <option value="1" {!! isset($product) && $product->is_best_selling == '1' ? 'selected' : '' !!}>Yes</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('description', 'Description') !!}
                {!! Form::textarea('description', null, ('required' == 'required') ? ['class' => 'form-control', 'id' => 'summary-ckeditor', 'required' => 'required'] : ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('image', 'Image') !!}
                <input class="form-control dropify" name="image" type="file" id="image" {{ ($product->image != '') ? "data-default-file = " . asset($product->image) : ''}} {{ ($product->image == '') ? "required" : ''}} value="{{asset($product->image)}}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('additional_image', 'Gallary Image') !!}
                <div class="gallery Images">
                @foreach($product_images as $product_image)
                <div class="image-single">
                <img src="{{ asset( $product_image->image)}}" alt="" id="image_id">
                <button type="button" class="btn btn-danger" data-repeater-delete="" onclick="getInputValue({{$product_image->id}}, this);"> <i class="ft-x"></i>Delete</button>               
                </div>
                @endforeach
                </div>
                <input class="form-control dropify" name="images[]" type="file" id="images" {{ ($product->additional_image != '') ? "data-default-file = /$product->additional_image" : ''}} value="{{$product->additional_image}}" multiple>
            </div>
        </div>
        <div class="col-md-12">
            <h4 class="card-title" id="repeat-form">Add Variation</h4>
        </div>
        @foreach($product->attributes as $pro_att_edits)
        <div class="col-md-12">
            <div data-repeater-list="attribute">
                <div data-repeater-item="" class="row">
                    <input type="hidden" value="{{ $pro_att_edits->id}}" name="product_attribute[]">
                        <div class="form-group mb-1 col-sm-12 col-md-3">
                            <label for="email-addr">Attribute</label>
                            <br>
                            <select class="form-control" id="attribute_id" name="attribute_id[]" onchange="getval(this)" readonly>
                            <option value="{{ $pro_att_edits->attribute_id }}">{{ $pro_att_edits->attribute->name }}</option>
                                <!-- @foreach($att as $atts)
                                <option value="{{ $atts->id}}">{{ $atts->name}}</option>
                                @endforeach -->
                            </select>
                        </div>
                        <div class="form-group mb-1 col-sm-12 col-md-3">
                            <label for="pass">value</label>
                            <br>
                             <select class="form-control value" id="value" name="value[]" readonly>
{{--                                <option value="{{ $pro_att_edits->value }}">{{ $pro_att_edits->attributesValues->value }}</option>--}}
                                <option value="{{ $pro_att_edits->value }}">{{ $pro_att_edits->value }}</option>
                            </select>
                        </div>
                        <div class="form-group mb-1 col-sm-12 col-md-2">
                            <label for="bio" class="cursor-pointer">Price</label>
                            <br>
                            <input type="number" name="v_price[]" class="form-control" id="price" value="{{ $pro_att_edits->price }}">
                        </div>
                        <div class="form-group mb-1 col-sm-12 col-md-2">
                            <label for="bio" class="cursor-pointer">qty</label>
                            <br>
                            <input type="number" name="qty[]" class="form-control" id="qty" value="{{ $pro_att_edits->qty }}">
                        </div>
                        <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                            <button onclick="deleteAttr({{ $pro_att_edits->id }}, this)" type="button" class="btn btn-danger" data-repeater-delete=""> <i class="ft-x"></i>
                                Delete</button>
                        </div>
                    
                    <hr>
                </div>
            </div>
        </div>
        @endforeach

        <div class="repeater-default col-md-12">
            <div data-repeater-list="attribute">
                <div data-repeater-item="" class="row">
                    
                        <div class="form-group mb-1 col-sm-12 col-md-3">
                            <label for="email-addr">Attribute</label>
                            <br>
                            <select class="form-control" id="attribute_id" name="attribute_id" onchange="getval(this)">
                                @foreach($att as $atts)
                                <option value="{{ $atts->id}}">{{ $atts->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-1 col-sm-12 col-md-3">
                            <label for="pass">value</label>
                            <br>
                             <select class="form-control value" id="value" name="value">

                            </select>   
                        </div>
                        <div class="form-group mb-1 col-sm-12 col-md-2">
                            <label for="bio" class="cursor-pointer">Price</label>
                            <br>
                            <input type="number" name="v-price" class="form-control" id="price" >
                        </div>
                        <div class="form-group mb-1 col-sm-12 col-md-2">
                            <label for="bio" class="cursor-pointer">qty</label>
                            <br>
                            <input type="number" name="qty" class="form-control" id="qty" >
                        </div>
                        <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                            <button type="button" class="btn btn-danger" data-repeater-delete=""> <i class="ft-x"></i>
                                Delete</button>
                        </div>
                    
                    <hr>
                </div>
            </div>
            <div class="form-group overflow-hidden">
                <div class="">
                    <button type="button" data-repeater-create="" class="btn btn-primary">
                        <i class="ft-plus"></i> Add
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-actions text-right pb-0">
    {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>

    $(document).ready(function() {

        $('#subcategory_sec').hide();


        $('#category').change(function() {

            var get_id = $('#category').val();

            // alert(get_id);

            if(get_id == '0'){

                $('#subcategory_sec').hide(500);

            }else{

                $('#subcategory_sec').show(500);

            }


            $.ajax({
                url: "{{route('set_sub_category')}}",
                type: "get",
                dataType: "json",
                data: {

                    "_token": "{{ csrf_token() }}",
                    get_id:get_id

                },
                success: function (response) {


                    if (response.status) {

                        console.log(response.getsub_category);
                        const options = response.getsub_category;
                        $('#subcategory').empty();
                        const selectElement = $('#subcategory');
                        const optionElement1 = $('<option></option>').attr('value', 0).text('----');
                        selectElement.append(optionElement1);
                        options.forEach((option) => {
                            const { id, name } = option;
                            const optionElement = $('<option></option>').attr('value', id).text(name);
                            selectElement.append(optionElement);
                        });

                    } else {
                        toastr.success(response.error);
                    }


                }
            });

        });


// Child Sub-Category Section

        $('#childsubcategory_sec').hide();

        $('#subcategory').change(function() {

            var get_child_id = $('#subcategory').val();

// alert(get_child_id);

            if(get_child_id == '0'){

                $('#childsubcategory_sec').hide(500);

            }else{

                $('#childsubcategory_sec').show(500);

            }

            $.ajax({
                url: "{{route('set_child_sub_category')}}",
                type: "get",
                dataType: "json",
                data: {

                    "_token": "{{ csrf_token() }}",
                    get_child_id:get_child_id

                },
                success: function (response) {


                    if (response.status) {

                        console.log(response.get_child_sub_category);

                        const options = response.get_child_sub_category;

                        $('#childsubcategory').empty();

                        const selectElement = $('#childsubcategory');

                        options.forEach((option) => {

                            const { id, name } = option;
                            const optionElement = $('<option></option>').attr('value', id).text(name);
                            selectElement.append(optionElement);

                        });


                    } else {

                        toastr.success(response.error);

                    }


                }
            });




        });






    });



</script>