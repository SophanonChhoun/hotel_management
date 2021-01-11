
    <table class="table table-bordered">
        <tr>
            <th>Payment No</th>
            <th>Customer</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Room Amount</th>
            <th>Total</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @forelse($data as $payment)
            <tr>
                <td>{{ $payment->id }}</td>
                <td>{{ $payment->customer->last_name ?? null }} {{ $payment->customer->first_name ?? null }}</td>
                <td>{{ $payment->booking->check_in_date ?? null }}</td>
                <td>{{ $payment->booking->check_out_date ?? null }}</td>
                <td>{{ $payment->amount }}</td>
                <td>{{ $payment->price }}</td>
                <?php
                if($payment->is_enable == 1)
                {
                    echo "<td style='color:green'>Active</td> ";
                }elseif ($payment->is_enable == 0)
                {
                    echo "<td style='color:red;'>Deactivate</td>";
                }elseif ($payment->is_enable == 2)
                {
                    echo "<td style='color:red;'>Cancel</td>";
                }
                ?>
                <td>
                    <a href="{{ url('admin/payments/show/'.$payment->id) }}" class="btn btn-success">Show</a>
                </td>
                @empty
                    <td colspan="7" class="text-center">There is no value</td>
            </tr>
        @endforelse
    </table>
