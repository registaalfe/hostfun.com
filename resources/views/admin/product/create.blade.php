<x-admin.layout>
    <div class="elementor-section flex flex-col px-8 py-8">
        <h1 class="text-2xl font-semibold text-[#34364A]">Create Product</h1>
        <form action="{{ route('admin.storeProduct') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col mt-6">
                <label class="font-karla py-2 text-[#34364A]">Name</label>
                <input
                    class="w-1/2 h-10 shadow appearance-none border rounded px-3 text-[#34364A] leading-tight focus:border-[#335EF7] focus:bg-[#F7F9FB] focus:outline-none focus:shadow-outline"
                    type="text" name="name_product" placeholder="Enter name product">

                <!-- Server-side validation error message -->
                @error('name_product')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col mt-4">
                <label class="font-karla py-2 text-[#34364A]">Category</label>
                <select
                    class="w-1/2 h-10 shadow appearance-none border rounded px-3 text-[#34364A] leading-tight focus:border-[#335EF7] focus:bg-[#F7F9FB] focus:outline-none focus:shadow-outline"
                    name="category_id">
                    <option disabled value>Select category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <!-- Server-side validation error message -->
                @error('category_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col mt-4">
                <label class="font-karla py-2 text-[#34364A]" for="image_path">Upload
                    file</label>
                <input
                    class="block w-1/2 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-[#34364A] dark:placeholder-gray-400"
                    name="image_path" id="image_path" type="file">

                <!-- Server-side validation error message -->
                @error('image_path')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>


            <div class="flex flex-col mt-4">
                <label class="font-karla py-2 text-[#34364A]">Price</label>
                <input
                    class="w-1/2 h-10 shadow appearance-none border rounded px-3 text-[#34364A] leading-tight focus:border-[#335EF7] focus:bg-[#F7F9FB] focus:outline-none focus:shadow-outline"
                    type="text" name="price_product" placeholder="Enter price">

                <!-- Server-side validation error message -->
                @error('price_product')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <button
                class="my-6 font-karla bg-[#335EF7] hover:bg-[#34364A] text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">Submit</button>
        </form>
    </div>
</x-admin.layout>
