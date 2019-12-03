import { Doughnut } from 'vue-chartjs'
export default {
    extends: Doughnut,
    data() {
        return {
            topicName: '',
            topicNumber: '',
            tagName: '',
            tagNumber: '',
        };
    },
    created() {
        let that = this;
        axios
            .get('/api/number/topics/tags')
            .then(res => {
                that.topicName = res.data.topicName;
                that.topicNumber = res.data.topicNumber;
                that.tagName = res.data.tagName;
                that.tagNumber = res.data.tagNumber;
                console.log(res.data.topicNumber);
                console.log(res.data.topicName);
            })
            .catch(err => console.log(err));
        console.log([40, 20, 12, 39, 10, 40, 39, 80, 40, 20, 12, 11])
    },
    mounted() {

        this.renderChart({
            type: 'doughnut',
            labels: ["Laravel", "Forntend", "Git", "Infrastructure", "Productivity"],
            datasets: [{
                data: [1, 1, 2, 2, 1]
            }]
        });
        // this.renderChart({
        //     type: 'doughnut',
        //     labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        //     datasets: [{
        //         data: [40, 20, 12, 39, 10, 40, 39, 80, 40, 20, 12, 11]
        //     }]
        // })
    }
}