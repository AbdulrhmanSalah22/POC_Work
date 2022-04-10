<div>
    <div class="container mt-3">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">CategoryName</th>
                <th scope="col"><label> Search</label>
                    <input class="form-control" placeholder="Type to search..." wire:model="search" width="100px">
            </tr>
            </thead>
{{--            {{$search}}--}}
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{$product['id']}}</th>
                    <td>{{$product['name']}}</td>
                    <td>{{$product['category']['name']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
