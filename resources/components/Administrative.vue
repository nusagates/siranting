<template>
    <v-container fluid>
        <v-card class="mx-auto px-6 py-8">
            <v-card>
                <v-toolbar color="success" density="compact">
                    <v-toolbar-title>
                        Daftar Provinsi
                    </v-toolbar-title>
                    <v-btn @click="dialog.province.create = true">Tambah</v-btn>
                </v-toolbar>
                <v-card-text py-3>
                    <v-table>
                        <thead>
                            <tr>
                                <th class="text-left">Provinsi</th>
                                <th class="text-left">Status</th>
                                <th class="text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(item, index) of collection.administrative">
                                <tr .key="index">
                                    <td v-text="item.name"></td>
                                    <td v-text="item.status"></td>
                                    <td class="text-right">
                                        <v-btn @click="showProvinceDetail(item)" size="small" color="success">Detail
                                        </v-btn>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </v-table>
                </v-card-text>
            </v-card>
        </v-card>
        <v-dialog v-model="modal" persistent :overlay="false" max-width="500px" transition="dialog-transition"
            v-if="modal">
            <v-toolbar color="success">
                <v-toolbar-title>

                </v-toolbar-title>
            </v-toolbar>
            <v-card>
                <v-card-text>
                    <v-text-field variant="outlined" label="Provinsi"></v-text-field>
                    <v-select variant="outlined" label="Status" :items="['Aktif', 'Tidak Aktif']"></v-select>
                    <v-btn @click="store" size="small" color="success">Kirim</v-btn>
                </v-card-text>
            </v-card>
        </v-dialog>

        <v-dialog v-model="dialog.province.detail" persistent :overlay="false" max-width="500px"
            transition="dialog-transition" v-if="dialog">
            <v-toolbar color="success">
                <v-toolbar-title v-if="selected.province !== null">
                    {{ selected.province.name }}
                </v-toolbar-title>
            </v-toolbar>
            <v-card>
                <v-card-text>
                    <v-text-field variant="outlined" label="Asal Kota"></v-text-field>
                    <v-btn @click="store" size="small" color="success">Kirim</v-btn>
                </v-card-text>
            </v-card>
        </v-dialog>

    </v-container>
</template>

<script>
export default {
    name: "Administrative",
    data() {
        return {
            dialog: {
                province: {
                    create: false,
                    delete: false,
                    detail: false,
                }
            },
            collection: {
                administrative: [
                    {
                        name: "Jawa Tengah",
                        status: "Aktif"
                    },
                ],
            },
            field: {
                user: {
                    province: null,
                    status: null,
                }
            },
            selected: {
                province: null
            }
        }
    },
    methods: {
        store() {
        },
        showProvinceDetail(item) {
            this.dialog.province.detail = true
            this.selected.province = item

        }
    },
    mounted() {
    },
}
</script>

<style scoped>

</style>
