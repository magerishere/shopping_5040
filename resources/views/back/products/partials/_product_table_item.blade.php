<tr>
    <td>{{$product->id}}</td>
    <td>{{$product->title}}</td>
    <td>
        <img src="{{$product->defaultImage?->getUrl()}}" alt="Product Image">
    </td>
    <td>{{$product->brief_content}}</td>
    <td></td>
</tr>
