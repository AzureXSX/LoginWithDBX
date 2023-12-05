import React from "react";
import ReactDOM from "react-dom/client";

class PostX extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            count: 0,
            UserName: '',
            UserImage: '',
        };
    }

    componentDidMount = async () =>{
        const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

        const response = await fetch('/LoginX', {
            method: "POST",
            headers:{
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: JSON.stringify({
                userEmail: 'pizza@gmail.com',
                userPassword: ''
            })
        });
    
        const data = await response.json();
    
        console.log(data);

        this.setState({UserName: data.user.UserName});
        this.setState({UserImage: data.user.UserImage});
        console.log(this.state.UserImage);
    }

    updateLikes = async (e) =>{
        if(e.classList.contains('ri-heart-line')) {
            e.classList.remove('ri-heart-line');
            e.classList.add('ri-heart-fill');
            this.setState({count: ++this.state.count})
        }
        else{
            e.classList.remove('ri-heart-fill');
            e.classList.add('ri-heart-line');   
            this.setState({count: --this.state.count})
        }
    }

    render() {
        return (
            <>
                <div className="custom-x-component">
                    <div className="user-x-div">
                        {
                            this.state.UserImage.includes("data:image/") ? (
                                <img src={this.state.UserImage}/>
                            )
                                
                            : 

                            (
                                <img src={"data:image/png;base64," + this.state.UserImage}/>
                            )
                        }
                        
                        <p>
                            { this.state.UserName } • <span>Follow</span> • {" "}
                            { this.state.count }
                        </p>
                        <i className="ri-more-fill"></i>
                    </div>

                    {
                            this.state.UserImage.includes("data:image/") ? (
                                <img src={this.state.UserImage}/>
                            )
                                
                            : 

                            (
                                <img src={"data:image/png;base64," + this.state.UserImage}/>
                            )
                        }

                    <div className="ui-x-pannel">
                        <i
                            style={{marginLeft: '0.8rem'}}
                            id="like-icon"
                            className="ri-heart-line"
                            onClick={async (e) =>{
                                await this.updateLikes(e.target);
                            }}
                        ></i>
                        <i
                            id="chat-x"
                            className="ri-chat-3-line"
                            style={{marginLeft: '0.47rem'}}
                        ></i>
                        <i
                            id="send-x"
                            className="ri-navigation-line"
                            style={{marginLeft: '0.67rem'}}
                        ></i>
                    </div>
                    <div className="description-x-div">
                        <p>
                            efuewufbeuibu bguiewiyu yfeyi gfyew f79ueqg 7u9f
                            geq79uf gweq9 f ywiqfyv wqy8f w7q8g f79wq gf79wg
                            q79fg wq79gf 79wqg f79wqg 7u9f uqvftueq vyuf yfg
                            y8qwg fy8qwg 7f gwq78fg 7wqf g7wqg f79wqh 8f9w hf4
                            fueqvufvqyufvtuywqvfyuvwyfqw7vf78wqvry8wqfvy8fvwy8fvwyq9fvy9wqvfy9wq
                            fyiwqfyuvwqyiufvqwyifyiqwvfyiqbfvwqfieqvfyebipfjnbiyewvfbipewnbyifeof
                            fvgviebqioctwqhjfoehyifoweil;vi0rwvfyiuweokf
                            yefuoieq9f yeqg fh9qefiqeyouf
                            fyueqvfuoqwyfveqbjnkmfeqgy
                            fuohiqjofgeqwuodhjwqfgwquoh g80gf 79wq gf80wq fyiqyf
                            wq78g f87qwg89 79qw fg80qwf79fwq90 79gw89fgwq89fg
                            7wqg 89eqf89q f79 fbuq fqw8 gf78wgq78 fwq gf78 wq7f
                            gwq68 f7g79qw d7g q7f9gqw89fg79wq gff q9fv fea if
                            78g79 78 g97f g79f g79eqg fyeqv yifuh
                            squivfyidhfudauifhuadgf fu0g f fhjbqhif yuqe vyy g
                            df 79 8gf78 gd7 gqifh 9eq gifp jhduig duoiqw9
                            dg8fqwef08qwe fueqgygyq8ef 79dgqw7 f79qewg 78vf9g
                            w79 qwyf6f7qew fqwf7wq97 f7wqf7wq97
                        </p>
                    </div>
                </div>
            </>
        );
    }

    Increment = () => {
        this.setState({ count: ++this.state.count });
    };
}

// export default function HelloReact() {
//     return <PostX></PostX>;
// }

if (
    document.getElementById("hello-react") &&
    document.getElementById("hello-react").innerHTML == ""
) {
    const container = document.getElementById("hello-react");
    const root = ReactDOM.createRoot(container);
    root.render(<PostX></PostX>);
}
