
    <table class="table table-responsive">
        <tr>
            <th>Customer</th>
            <th>Room Amount</th>
            <th>Total</th>
            <th>Status</th>
            <th colspan="2">Action</th>
        </tr>
        @forelse($data as $payment)
            <tr>
                <td>{{ $payment->customer->last_name ?? null }} {{ $payment->customer->first_name ?? null }}</td>
                <td>{{ $payment->amount }}</td>
                <td>
                    <?php
                        if($payment->is_enable == 1)
                        {
                            echo "Active";
                        }elseif ($payment->is_enable == 0)
                        {
                            echo "Deactivate";
                        }elseif ($payment->is_enable == 2)
                        {
                            echo "Cancel";
                        }
                    ?>
                </td>
                <td></td>
                @empty
                    <td colspan="5" class="text-center">There is no value</td>
            </tr>
        @endforelse
    </table>
