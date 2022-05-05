<template>
    <div>
        <div class = "" onload="detail($event)"></div>
    </div>
</template>

<script>
    var count = 0;
    export default {
        mounted() {
            setInterval(this.changeimg, 3500);
        },
        methods: {
            changeimg(event) {
                console.log(count);
                if (count==4)
                {
                    count = 0;
                }
                count = count + 1;
                var img1 = document.getElementsByClassName("img")[0];
                var img2 = document.getElementsByClassName("img")[1];
                var img3 = document.getElementsByClassName("img")[2];
                if (count == 1){
                    img1.style.display = "none";
                    img2.style.display = "block";
                    img3.style.display = "none";
                }
                if (count == 2){
                    img1.style.display = "none";
                    img2.style.display = "none";
                    img3.style.display = "block";
                }
                if (count == 3){
                    img1.style.display = "block";
                    img2.style.display = "none";
                    img3.style.display = "none";       
                }
            }
        }
    }
    
</script>
