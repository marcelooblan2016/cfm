<template>
    <div>
		<form method="POST" action="/deliveries">
		  <input type="hidden" name="_token" :value="csrfToken" />
		  <div class="mb-6">
		    <label for="account" class="block mb-2 text-sm font-medium text-gray-900">Account</label>
		    <select name="account" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@flowbite.com" required v-model="accountId">
		    	<template v-for="(user, index) in users">
		    	    <option :value="user.id">{{ user.name }}</option>
		    	</template>
		    </select>
		  </div>

		  <div class="mb-6">
		    <label for="folder" class="block mb-2 text-sm font-medium text-gray-900">Folder</label>
		    <select name="folder" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@flowbite.com" required>
		    	<template v-for="(folder, index) in availableFolders" v-if="availableFolders != null">
		    	    <option :value="folder">{{ folder }}</option>
		    	</template>
		    </select>
		  </div>
		  <div class="mb-6">
		    <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
		    <textarea name="description" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required v-model="description"></textarea>
		  </div>

		  <div class="mb-6">
		    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            	Save Delivery
        	</button>
		  </div>

		</form>
    </div>
</template>
<script>
	export default {
		props: {
			users: {
				required: true,
			},
			csrfToken: {
				required: true,
			}
		},

		data () {
			return {
				accountId: null,
				availableFolders: null,
				selectedFolder: null,
				description: null,
			};
		},

		created () {
			this.accountId = this.users[0]['id'];
			this.loadAvailableFolders();
		},

		methods: {
			loadAvailableFolders () {
                axios.get('/deliveries/load-available-folders', {
                    params: {
                        accountId: this.accountId,
                    },
                })
                .then((response) => {
                	this.availableFolders = response.data;
                	this.selectedFolder = this.availableFolders ?? null;
                })
                .catch((error) => {
                    console.log(error)
                })
			}
		}
	}
</script>