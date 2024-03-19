//  Graphs

const sales = document.getElementById("sales");
const earning = document.getElementById("earning");
Chart.defaults.color = "#927685";
Chart.defaults.borderColor = "#33202c";

new Chart(sales, {
  type: "bar",
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May", "June", "July"],
    datasets: [
      {
        label: "My Revenue in ksh",
        data: [38000, 20000, 50000, 30000, 15000, 40000, 10000],
        backgroundColor: ["rgba(240,179,178,1)"],
        hoverBackgroundColor: "#FF90B8",
      },
    ],
  },
  options: {
    responsive: true,
    plugins: {
      legend: {
        display: false,
      },
    },
  },
});

new Chart(earning, {
  type: "line",
  data: {
    labels: ["Jan", "Feb", "Mar", "Apr", "May"],
    datasets: [
      {
        label: "My Revenue",
        data: [38000, 20000, 50000, 30000, 15000],
        backgroundColor: ["rgba(155,128,151,1)"],
        hoverBackgroundColor: "#FF90B8",
      },
    ],
  },
  options: {
    responsive: true,
    plugins: {
      legend: {
        display: false,
      },
    },
  },
});

