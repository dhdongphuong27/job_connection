<template>
    <div>
        <button class = "detailBtn btn btn-primary" v-on:click="detail($event)">Chi tiết</button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            detail(event) {
                var moreText = event.target.parentNode.parentNode.getElementsByClassName("description")[0];
                var detailBtn = event.target.parentNode.parentNode.getElementsByClassName("detailBtn")[0];
                if (moreText.style.display !== "none") {
                    detailBtn.innerHTML = "Chi tiết";
                    moreText.style.display = "none";
                } else {
                    detailBtn.innerHTML = "Thu gọn";
                    moreText.style.display = "inline";
                }
            }
        }
    }
    
</script>
