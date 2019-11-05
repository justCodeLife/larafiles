<tr>
    <td>{{ $plan->plan_title }}</td>
    <td>{{ $plan->plan_limit_download_count }}</td>
    <td>{{ $plan->plan_price }}</td>
    <td>{{ $plan->plan_days_count }}</td>
    <td>
        @include('admin.plan.operations',$plan)
    </td>
</tr>
