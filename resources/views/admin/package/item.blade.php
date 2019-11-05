<tr>
    <td>{{ $package->package_title }}</td>
    <td>{{ $package->package_price }}</td>
    <td>{{ $package->files()->get()->count() }}</td>
    <td>
        @include('admin.package.operations',$package)
    </td>
</tr>
