<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Meals') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-4" id="categories">
                        {{-- API --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener("DOMContentLoaded", function (event) {

        fetch(`https://www.themealdb.com/api/json/v1/1/categories.php`)
            .then(response => response.json())
            .then(data => {

                let categoryCard = '';

                data.categories.forEach((category) => {

                    let description = category.strCategoryDescription.substring(0, 200);

                    categoryCard += `
                    <div class="rounded overflow-hidden border w-full shadow-sm">
                            <div class="w-full flex justify-between p-3">
                                <a href="#!">
                                    <span class="pt-1 ml-2 font-bold text-lg">${category.strCategory}</span>
                                </a>
                            </div>
                            <img class="w-full bg-cover"
                                 src="${category.strCategoryThumb}" >
                            <div class="px-3 pb-2">
                                <div class="pt-3">
                                    <div class="mb-2 text-sm">
                                        ${description} ...
                                    </div>
                                </div>
                            </div>
                    </div>
                    `;
                });

                document.getElementById('categories').innerHTML = categoryCard;

            })
            .catch(e => console.log(e))

    })
    ;
</script>
