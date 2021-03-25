<template>
    <div>
        <br/>
        <h3 class="text-center">Students who have obtained more than 250 total marks</h3><br/>
 <div class="container h-100 d-flex justify-content-center">
        <table >
            <thead>
            <tr>
                <th>Names List</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="winner in winners" :key="winner.id">
               
                <td>
                    <template v-if="winner.marks.length > 0">
            {{winner.name}}
         </template> 
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                winners: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/winners')
                .then(response => (
                    this.winners = response.data
                ));
        },
      
    }
</script>