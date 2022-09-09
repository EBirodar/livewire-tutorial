<div class="container flex justify-center p-3">
    <form class="w-full max-w-lg mt-3">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="md:w-1/2 d-flex align-items-center">
                <div class="w-full  px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Course Currency
                    </label>
                    <select  id="currency" wire:model="currencyType" >
                        @foreach($currencies as $currency)
                        <option value="{{$currency['value']}}" >{{$currency['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Amount
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 "
                       id="grid-last-name" type="number" placeholder="enter amount" wire:model.debounce.500ms="amount">
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            @foreach($currencies as $currency)
            <div class="w-full row px-3 my-3">
                <h1 data-field="name" class="col-4 d-flex align-items-center">{{$currency['name']}}</h1>
                @php $id=$currency['id'] @endphp
                <h2 class="col-4 d-flex align-items-center"   >
                    {{round($balance*$currency['value'],5)}}
                </h2>
                <input type="number" class="col-4" value="1" wire:model="currencyy.{{ $currency['id']}}">
            </div>
            @endforeach
        <div class="flex justify-between">
            <h2>{{$amount}}</h2>
{{--            <h2>{{$newAmountUsd+$newAmountUzs/11000+$newAmountEuro/1.1}}</h2>--}}
        </div>

            @foreach($currencyy as $ass)
                {{ $ass }}
            @endforeach
        {{$newbalance}}

    </form>
</div>
