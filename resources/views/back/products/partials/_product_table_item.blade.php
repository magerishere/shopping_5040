<tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$product->title}}</td>
    <td>
        <x-back.image
            imageSrc="{{$product->defaultImage?->getUrl()}}"
            imageAlt="Product Image"
            imageWidth="100"
            imageHeight="100"
        />
    </td>
    <td>{{$product->brief_content}}</td>
    <td>
        <div class="row">
            <div class="col">
                <x-back.button type="button" buttonLink="{{route('admin.products.edit',$product->id)}}">
                    Edit <i class="bi bi-pencil"></i>
                </x-back.button>
            </div>
            <div class="col">
                <x-back.form routeName="{{route('admin.products.destroy',$product->id)}}" formMethod="DELETE">
                    <x-slot:submitButtonSlot>
                        <x-back.button buttonColor="danger">
                            Delete <i class="bi bi-trash"></i>
                        </x-back.button>
                    </x-slot:submitButtonSlot>

                </x-back.form>
            </div>
        </div>
    </td>
</tr>
