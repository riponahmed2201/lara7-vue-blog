<template>
    <div>
       <div class="content">
			<div class="container-fluid">
				<!--~~~~~~~ TABLE ONE ~~~~~~~~~-->
				<div class="_1adminOverveiw_table_recent _box_shadow _border_radious _mar_b30 _p20">
					<p class="_title0">Tags  <Button @click="addModal=true"><Icon type="md-add" /> Add tag</Button></p>

					<div class="_overflow _table_div">
						<table class="_table">
								<!-- TABLE TITLE -->
							<tr>
								<th>ID</th>
								<th>Tag name</th>
								<th>Created at</th>
								<th>Action</th>
							</tr>
								<!-- TABLE TITLE -->


								<!-- ITEMS -->
							<tr v-for="(tag, i) in tags" :key="i" v-if="tag.length">
								<td>{{ tag.id }}</td>
								<td class="_table_name">{{ tag.tagName }}</td>
								<td>{{ tag.created_at }}</td>
								<td>
                                    <Button type="info" size="small">Edit</Button>
                                    <Button type="error"  size="small">Delete</Button>
								</td>
							</tr>
								<!-- ITEMS -->
						</table>
					</div>
				</div>
                    <!-- adding tag modal -->
                    <Modal
                    v-model="addModal"
                    title="Add tag"
                    :mask-closable="false"
                    :closable="false"
                      >
                    <Input v-model="data.tagName" placeholder="Add tag name"/>

                    <div slot="footer">
                         <Button type="default" @click="addModal=false"> Close </Button>
                         <Button type="primary" @click="addTag" :disabled="isAdding" :loading="isAdding"> {{ isAdding ? 'Adding...' : 'Add tag'}} </Button>
                    </div>
                </Modal>

			</div>
		</div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            data : {
                 tagName:''
            },
            addModal : false,
            isAdding : false,
            tags : []
        }

    },

    methods: {
     async addTag(){
            if(this.data.tagName.trim() =='') return this.e('Tag name is required')
            const res = await this.callApi('post','app/create_tag', this.data)
            if (res.status == 201) {
                this.s('Tag has been added successfully!')
                this.tags.unshift(res.data)
                this.addModal = false
                this.data.tagName = ''
            }else{
                this.swr()
            }

        }
    },

    async created() {
    const res = await this.callApi('get','app/get_tags')
    if (res.status == 200) {
        this.tags = res.data
    }else{
        this.swr()
    }
},

    // async created() {
    //     const res = await this.callApi('post','/app/create_tag',{tagName: 'testtag'});

    //     if (res.status == 200) {
    //         console.log(res)
    //     } else {
    //         console.log(res)
    //         console.log('running');
    //     }
    // },
}
</script>
