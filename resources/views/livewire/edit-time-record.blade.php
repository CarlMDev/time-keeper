<div class="flex justify-center pt-4">
    <div class="grid grid-cols-1">
        <div class="py-3">Current Record date: <span class="text-red-600">{{$recordDate}}</span></div>
        <div class="py-3">Current Record time: <span class="text-red-600">{{$recordTime}}</span></div>

        <div class="py-3">Select new date and time values:</div>
        <div class="py-5">
            <label for="record-date">Date:</label>
            <input type="datetime-local" placeholder="dd-mm-yyyy" value="" name="record-date" min="2000-01-01"
                max="2100-12-31" required />
        </div>
        <div class="my-2">
            <a href="{{ url('/dashboard') }}"
                class="bg-red-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-2 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                type="button">
                Cancel
            </a>
            <button
                class="bg-emerald-500 text-white active:bg-red-600 font-bold uppercase text-xs px-4 py-2 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                Submit modification
            </button>
        </div>
    </div>
</div>