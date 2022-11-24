@extends('home._layouts.master')

@section('body')

<form action="{{ route('order.store') }}" method="post">
@csrf
@method('POST')
    <!-- breadcrumb -->
    <div class="container py-4 flex items-center gap-3">
        <a href="../index.html" class="text-primary text-base">
            <i class="fa-solid fa-house"></i>
        </a>
        <span class="text-sm text-gray-400">
            <i class="fa-solid fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">Checkout</p>
    </div>
    <!-- ./breadcrumb -->

    <!-- wrapper -->
    <div class="container grid grid-cols-12 items-start pb-16 pt-4 gap-6">

        <div class="bg-white col-span-8 border border-gray-200 p-4 rounded">
            <h3 class="text-lg font-medium capitalize mb-4">Checkout</h3>
            <div class="space-y-4">

                <div >
                    <div>
                        @extends('home._layouts._error')
                    </div>
                    <div>
                        <label for="first-name" class="text-gray-600">Reciver Name </label>
                        <input type="text" name="name" value="{{ old('name') }}" id="first-name" class="input-box" required>
                    </div>
                </div>
                <div>
                    <label for="phone" class="text-gray-600">Phone number</label>
                    <input type="text" name="phone" value="{{ old('phone') }}"  id="phone" class="input-box" required>
                </div>

                <div>
                    <label for="phone" class="text-gray-600">Date</label>
                    <input type="date" name="delivery_date" value="{{ old('delivery_date') }}"  id="phone" class="input-box" required>
                </div>

                <div>
                    <label for="phone" class="text-gray-600">Time</label>
                    <input type="time" name="delivery_time"  value="{{ old('delivery_time') }}" id="phone" class="input-box" required>
                </div>

                <div>
                    <label for="city" class="text-gray-600">City</label>
                    <select name="city" id="" class="input-box">
                        <option value="Damascus">Damascus</option>
                        <option value="Homs">Homs</option>
                        <option value="Hama">Hama</option>
                        <option value="Latakia">Latakia</option>
                        <option value="Aleppo">Aleppo</option>
                        <option value="Tartus">Tartus</option>
                        <option value="Daraa">Daraa</option>
                        <option value="Suwayda">Suwayda</option>
                        <option value="Hasaka">Hasaka</option>
                        <option value="Der_Al_Zor">Der_Al_Zor</option>
                        <option value="Raqqa">Raqqa</option>
                        <option value="Quneitra">Quneitra</option>
                    </select>
                </div>
                <div>
                    <label for="address" class="text-gray-600">Street address</label>
                    <input type="text" name="address" value="{{ old('address') }}"  id="address" class="input-box" required>
                </div>

                <div>
                    <label for="address" class="text-gray-600">Details</label>
                   <textarea name="details" id="" class="input-box"> {{ old('details') }} </textarea>
                </div>


            </div>

        </div>

        <div class="bg-white col-span-4 border border-gray-200 p-4 rounded">
            <h4 class="text-gray-800 text-lg mb-4 font-medium uppercase">Order Price</h4>

            <div class="flex justify-between border-b border-gray-200 mt-1 text-gray-800 font-medium py-3 uppercas">
               <div>
                <label for="price" class="text-gray-600">Price</label>
                <input type="number" class="input-box" name="price" required>
               </div>
            </div>



            <div class="flex items-center mb-4 mt-2">
                <input type="checkbox" name="aggrement" id="aggrement"
                    class="text-primary focus:ring-0 rounded-sm cursor-pointer w-3 h-3">
                <label for="aggrement" class="text-gray-600 ml-3 cursor-pointer text-sm">I agree to the <a href="#"
                        class="text-primary">terms & conditions</a></label>
            </div>

            <button type="submit"
                class="block w-full py-3 px-4 text-center text-white bg-primary border border-primary rounded-md hover:bg-transparent hover:text-primary transition font-medium">Place
                order</button>
        </div>

    </div>
    <!-- ./wrapper -->
</form>

@endsection
