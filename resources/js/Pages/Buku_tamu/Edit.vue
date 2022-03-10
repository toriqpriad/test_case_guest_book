<template>

    <div>
        <div class="card border-0 rounded shadow">
            <div class="card-body">
                <h4>EDIT DATA</h4>
                <hr>
                <form @submit.prevent="UpdateBukuTamu">
                    <div class="mb-3">
                        <label class="form-label">Firstname</label>
                        <input type="text" class="form-control" v-model="buku_tamu.firstname"
                               placeholder="Masukkan First Name">
                        <div v-if="errors.firstname" class="mt-2 alert alert-danger">
                            {{ errors.title }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lastname</label>
                        <input type="text" class="form-control" v-model="buku_tamu.lastname"
                               placeholder="Masukkan Last Name">
                        <div v-if="errors.lastname" class="mt-2 alert alert-danger">
                            {{ errors.content }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Organization</label>
                        <input type="text" class="form-control" v-model="buku_tamu.organization"
                               placeholder="Masukkan Organization">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea class="form-control" rows="5" v-model="buku_tamu.address"
                                  placeholder="Masukkan Lastname"></textarea>
                    </div>
                    <div class="mb-3">

                        <inertia-link :href="`/buku-tamu`" class="btn btn-default btn-md shadow-sm me-2">KEMBALI
                        </inertia-link>
                        <button type="submit" class="btn btn-primary btn-md shadow-sm me-2">SIMPAN</button>
                        <button type="reset" class="btn btn-warning btn-md shadow-sm">RESET</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
//import layout
import LayoutApp from '../../Layouts/App.vue'

import {reactive} from 'vue'
import {Inertia} from '@inertiajs/inertia'

export default {

    //layout
    layout: LayoutApp,

    //props
    props: {
        errors: Object,
        record: Object
    },

    //define Composition Api
    setup(props) {

        const buku_tamu = reactive({
            firstname: props.record.firstname,
            lastname: props.record.lastname,
            organization: props.record.organization,
            address: props.record.address,
        })

        function UpdateBukuTamu() {
            Inertia.put(`/buku-tamu/${props.record.id}`, {
                firstname: buku_tamu.firstname,
                lastname: buku_tamu.lastname,
                organization: buku_tamu.organization,
                address: buku_tamu.address,
            })

        }

        return {
            buku_tamu,
            UpdateBukuTamu
        }

    }
}
</script>
