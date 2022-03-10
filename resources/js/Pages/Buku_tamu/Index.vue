<template>
    <div class="mt-5">
        <!-- flash message -->
        <div v-if="$page.props.flash.message" class="alert alert-success" role="alert">
            {{ $page.props.flash.message }}
        </div>
        <!-- flash message -->
        <div class="mb-3">
            <inertia-link :href="`/buku-tamu/create`" class="btn btn-md btn-primary">TAMBAH DATA</inertia-link>
        </div>
        <div class="card border-0 rounded shadow-sm">
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Firstname</th>
                        <th scope="col">Lastname</th>
                        <th scope="col">Organization</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="rec in records" :key="rec.id">
                        <td>{{ rec.firstname }}</td>
                        <td>{{ rec.lastname }}</td>
                        <td>{{ rec.organization }}</td>
                        <td>{{ rec.address }}</td>
                        <td class="text-center">
                            <inertia-link :href="`/buku-tamu/${rec.id}/edit`" class="btn btn-sm btn-primary me-2">EDIT
                            </inertia-link>
                            <button @click.prevent="deletePost(`${rec.id}`)" class="btn btn-sm btn-danger">DELETE
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
//import layout
import LayoutApp from '../../Layouts/App.vue'
import {Inertia} from '@inertiajs/inertia'

export default {

    //layout
    layout: LayoutApp,

    //props
    props: {
        records: Array // <- nama props yang dibuat di controller saat parsing data
    },


    //define Composition Api
    setup() {

        //method deletePost
        function deletePost(id) {

            Inertia.delete(`/buku-tamu/${id}`)

        }

        return {
            deletePost
        }

    }
}
</script>

<style>

</style>
