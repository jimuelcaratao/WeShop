<!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                {{-- table start --}}
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                            {{ $tableColumn }}
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                            {{ $tableRow }}
                    </tbody>
                </table>{{-- table end --}}
            </div>
        </div>
    </div>
</div>
