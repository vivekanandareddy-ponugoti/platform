# Setting Up a Local Installation of Ushahidi Platform: A Step-by-Step Guide

![Virtual Machine](https://github.com/vivekanandareddy-ponugoti/platform/blob/develop/img/platform1.png)

## Introduction

Ushahidi Platform is an open-source web application for information collection, visualization, and interactive mapping. It can collect information from various sources like SMS, Twitter, RSS feeds, and Email, and allows you to process that information, categorize it, geo-locate it, and publish it on a map. In this guide, we'll set up a local instance of the Ushahidi Project using a Linux virtual machine. 

## Step 1: Creating a Virtual Machine (VM)

First, we need to set up a VM running a Linux distribution. For this guide, we'll use Ubuntu because of its user-friendly interface and strong community support. 

To create the VM, we'll use VirtualBox, an open-source hypervisor. Download and install VirtualBox from their official website. Once installed, create a new VM. Download the Ubuntu ISO file from its official site, use it as the startup disk, and follow the instructions to install Ubuntu on your VM. 

## Step 2: Installing Essential Tools

Once you've installed Ubuntu, it's time to install Docker, Make, and Git. These tools are essential for setting up Ushahidi locally.

![Terminal1](https://github.com/vivekanandareddy-ponugoti/platform/blob/develop/img/platform2.png)
![Terminal2](https://github.com/vivekanandareddy-ponugoti/platform/blob/develop/img/platform3.png)
![LocalHost:8080](https://github.com/vivekanandareddy-ponugoti/platform/blob/develop/img/localhost.png)

Ubuntu uses APT as its default package manager. Open the terminal and run:

\`\`\`bash
sudo apt-get update
\`\`\`

Then, install Docker, Make, and Git using the following commands:

\`\`\`bash
sudo apt-get install docker.io
sudo apt-get install make
sudo apt-get install git
\`\`\`

**Docker** allows you to create, deploy, and run applications in containers. This containerization allows applications to be packaged with their dependencies, making them portable and ensuring they run consistently across different environments.

**Make** is a build automation tool used to manage and build projects. It reads files called Makefiles to determine what pieces of a program need to be compiled and how to compile them.

**Git** is a version control system used to track changes in files. It's essential for managing and collaborating on software projects.

## Step 3: Deploying the Ushahidi Platform

With the necessary tools installed, you can now clone the Ushahidi project repository into your VM:

\`\`\`bash
git clone https://github.com/ushahidi/platform.git
\`\`\`

Next, navigate into the repository's directory and follow the instructions provided in the [install documentation](https://github.com/ushahidi/platform) to start Ushahidi locally. The instructions will involve building the project and starting it with Docker.

![Docker1](https://github.com/vivekanandareddy-ponugoti/platform/blob/develop/img/Docker.png)
![Docker2](https://github.com/vivekanandareddy-ponugoti/platform/blob/develop/img/Docker.png)

Interact with your local Ushahidi instance through a web browser within your VM. Navigate to the localhost address and port where Ushahidi is running, and you'll be able to use the platform's features, such as creating surveys, configuring data sources, and visualizing collected information.

## Conclusion

In this guide, we walked through the process of setting up a local instance of the Ushahidi Platform using a Linux VM. We installed Docker, Make, and Git, which are vital tools for managing and building the Ushahidi project. 

The Ushahidi Platform provides valuable features for data collection, categorization, geolocation, and visualization, making it a powerful tool for data analysis and decision-making processes. Whether you're a grassroots organization, a developer, or an analyst, Ushahidi offers many opportunities to leverage these features for your goals.

I encourage you to explore what Ushahidi has to offer and to contribute to this open-source project. Get started with Ushahidi today!
